<?php

namespace App\Livewire;

use App\Models\ExhibitionBooking;
use App\Models\JSON\ExhibitionAttendee;
use App\Models\JSON\ExhibitionAttendeeList;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

/**
 * Summary of AddExhibitionAttendees
 * @property ExhibitionBooking $exhibitionBooking
 */
class AddExhibitionAttendees extends Component
{
    #[Locked]
    public $exhibitionBookingId;

    #[Locked]
    public $submitted = false;

    #[Locked]
    public ?ExhibitionAttendeeList $attendeeList = null;

    #[Computed]
    public function exhibitionBooking()
    {
        return ExhibitionBooking::find($this->exhibitionBookingId);
    }

    #[Locked]
    public $totalPrice = 0;

    #[Locked]
    public $emails = []; // To store the attendee emails

    #[Validate(
        rule: [
            'required',
            'email',
            'exists:users,email',
        ],
        attribute: 'Email',
        message: [
            'email.exists' => 'No user registered with this email please check your email'
        ]
    )]
    public $email = '';

    /**
     * @param bool $withId
     * @return \Illuminate\Support\Collection|\App\Models\User[]
     */
    #[Computed]
    public function attendees($withId = false, $withEmailAsKeys = true)
    {
        $users = User::whereIn('email', $this->emails)->get();

        $mappingFunction = function (User $user) use ($withId, $withEmailAsKeys) {
            $profile = $user->profile;
            $data = [
                'name' => $user->name,
                'institution' => $profile?->institution_name ?? 'Testing',
                'nationality' => $profile?->nationality,
                'reg_status' => $profile?->registration_status,
                'reg_number' => $profile?->registration_number,
                'price' => $this->exhibitionBooking()->booth_attendee_fee ?? PHP_INT_MAX, // Just in case someone does something fishy
            ];

            if ($withId) {
                $data['user_id'] = $user->id;
            }

            return $withEmailAsKeys
                ? [$user->email => $data]
                : $data;
        };

        return $withEmailAsKeys
            ? $users->mapWithKeys($mappingFunction)
            : $users->map($mappingFunction);
    }

    /**
     * @return int
     */
    #[Computed]
    public function ticketCount()
    {
        return count($this->emails);
    }

    public function mount(int $exhibitionBookingId)
    {
        $this->exhibitionBookingId = $exhibitionBookingId;

        // Initialize with one attendee input
        /* $this->attendees = [
            ['name' => '', 'phone' => '', 'email' => '']
        ]; */

    }

    public function addAttendee()
    {
        ['email' => $validatedEmail] = $this->validateOnly('email');
        if (in_array($validatedEmail, $this->emails)) {
            throw ValidationException::withMessages([
                'email' => 'This email has already been added',
            ]);
        }

        $user = User::whereEmail($validatedEmail)->first();
        $emailHasTicket = Ticket::whereEventModelId($this->exhibitionBooking()->event_model_id)
            ->whereUserId($user->id)
            ->exists();
        if ($emailHasTicket) {
            throw ValidationException::withMessages([
                'email' => 'This user has already booked a ticket for this event',
            ]);
        }

        $this->emails[] = $validatedEmail;
        $this->reset('email');
        $this->dispatch('update-attendees');
    }

    public function removeAttendee($index)
    {
        if (count($this->emails) > 0) {
            unset($this->emails[$index]);
            $this->emails = array_values($this->emails); // Reindex the array
            $this->dispatch('update-attendees');
        }
    }

    #[On('update-attendees')]
    public function updateTotalPrice()
    {
        $this->totalPrice = $this
            ->attendees()
            ->reduce(function (?int $carry, array $value) {
                return $carry + $value['price'];
            });
    }

    public function store()
    {
        if ($this->ticketCount() < 1)
            throw ValidationException::withMessages(['email' => 'You must add atleast one person to book an event']);

        $this->updateTotalPrice();

        $addedAttendees = $this
            ->attendees(withId: true, withEmailAsKeys: false)
            ->map(function ($attendee) {
                $attendeeObj = new ExhibitionAttendee(
                    $attendee['user_id'],
                    $this->exhibitionBookingId,
                    $attendee['name'],
                    $attendee['nationality'],
                    $attendee['reg_status'],
                    $attendee['reg_number'],
                    $attendee['price'],
                );

                return $attendeeObj;
            });

        $this->attendeeList = new ExhibitionAttendeeList(
            $this->exhibitionBooking->id,
            $addedAttendees
        );
        $this->submitted = true;
    }

    public function render()
    {
        return view('livewire.add-exhibition-attendees');
    }
}
