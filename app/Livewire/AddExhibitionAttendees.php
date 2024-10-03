<?php

namespace App\Livewire;

use App\Models\ExhibitionBooking;
use App\Models\JSON\ExhibitionAttendee;
use App\Models\JSON\ExhibitionAttendeeList;
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

    #[Validate('integer|min:1')]
    public $count = 0; // To track the number of attendees

    #[Validate(
        rule: [
            // 'attendees' => 'array:name,phone,email|min:1',
            'attendees.*.name' => 'required|string|max:255',
            'attendees.*.phone' => 'required|string|max:15',
            'attendees.*.email' => 'required|email',
        ],
        attribute: [
            'attendees.*.name' => 'Name',
            'attendees.*.phone' => 'Phone',
            'attendees.*.email' => 'Email',
        ]
    )]
    public $attendees = []; // To store the attendee details

    #[Validate('required|numeric')]
    public $totalPrice = 0;
    public $ticketCounts = 0;

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
        $this->count++;
        $this->ticketCounts++;
        $this->attendees[] = ['name' => '', 'phone' => '', 'email' => ''];
        $this->dispatch('update-attendees');
    }

    public function removeAttendee($index)
    {
        if ($this->count > 1) {
            unset($this->attendees[$index]);
            $this->attendees = array_values($this->attendees); // Reindex the array
            $this->count--;
            $this->ticketCounts--;
            $this->dispatch('update-attendees');
        }
    }

    #[On('update-attendees')]
    public function updateTotalPrice()
    {
        $this->totalPrice = 450_000 * $this->ticketCounts;
    }

    public function store()
    {
        $this->updateTotalPrice();
        $validatedData = $this->validate();

        $addedAttendees = collect($validatedData['attendees'])
            ->map(function ($attendee) {
                $attendeeObj = new ExhibitionAttendee(
                    $attendee['name'],
                    $attendee['phone'],
                    $attendee['email'],
                    $this->exhibitionBookingId,
                    450_000,
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
