<?php

namespace App\Livewire;
use App\Models\EventBooking;
use App\Models\EventModel;


use App\Models\Ticket;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateEventBooking extends Component
{
    #[Locked]
    public EventModel $event;

    #[Locked]
    public EventBooking $booking;

    #[Url(history: true)]
    public $bookingType;

    #[Locked]
    public $totalPrice = 0;

    #[Locked]
    public $emails = []; // To store the attendee details

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

    #[Validate(
        rule: [
            'required',
        ],
        attribute: 'Terms and Conditions',
        message: [
            'required' => 'You must agree to the terms and conditions to book an event'
        ]
    )]
    public $agreeTerms = null;

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
                'price' => $this->event->getEventPackageForUser($user)['amount'] ?? PHP_INT_MAX, // Just in case someone does something fishy
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

    public function mount($event)
    {
        $this->$event = $event;
        $this->emails = [];

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
        if (!$this->event->getEventPackageForUser($user)) {
            throw ValidationException::withMessages([
                'email' => 'The user with this email can not participate in this event',
            ]);
        }

        $emailHasTicket = Ticket::whereEventModelId($this->event->id)
            ->whereUserId($user->id)
            ->exists();
        if ($emailHasTicket) {
            throw ValidationException::withMessages([
                'email' => auth()->user()->id == $user->id
                    ? 'You already have a ticket for this event'
                    : 'This user has already booked a ticket for this event',
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

    public function chooseBookingType($type)
    {
        $this->bookingType = $type;

        // If the booking type not single, ignore validations
        if ($this->bookingType !== EventBooking::TYPE_SINGLE) {
            $this->resetErrorBag('email');
            $this->reset('email');
            return;
        }

        $this->email = auth()->user()->email;
        try {
            $this->addAttendee();
        } catch (\Throwable $e) {
            $this->bookingType = null;
            throw $e;
        }
    }

    public function isSingleBooking()
    {
        return $this->bookingType === EventBooking::TYPE_SINGLE;
    }

    public function render()
    {
        return view('livewire.create-event-booking');
    }

    public function search()
    {
        $this->validateOnly('email');
    }

    public function store()
    {
        if ($this->ticketCount() < 1)
            throw ValidationException::withMessages(['email' => 'You must add atleast one person to book an event']);

        $this->validateOnly('agreeTerms');

        $this->updateTotalPrice();

        $this->booking = EventBooking::create([
            'attendees' => $this->attendees(withId: true, withEmailAsKeys: false),
            'user_id' => auth()->id(),
            'event_id' => $this->event->id,
            'total_amount' => $this->totalPrice,
            'attendee_count' => $this->ticketCount(),
            'type' => $this->bookingType,
        ]);
    }
}
