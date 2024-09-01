<?php

namespace App\Livewire;
use App\Models\EventBooking;
use App\Models\EventModel;


use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateEventBooking extends Component
{
    #[Locked]
    public EventModel $event;
    #[Locked]
    public EventBooking $booking;
    #[Locked]
    public $singleTicketPrice = 0;

    #[Validate('required|numeric')]
    public $totalPrice = 0;
    public $ticketCounts = 1;

    #[Validate('required|string')]
    public $registrationStatus = '';

    #[Validate('integer|min:1')]
    public $count = 1; // To track the number of attendees

    #[Validate(
        rule: [
            // 'attendees' => 'array:name,phone,email|size:1',
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

    #[Validate('nullable|string|max:255')]
    public $institution_name = '';

    #[Validate('required|string|max:100')]
    public $nationality = '';

    #[Validate('required_if:registrationStatus,registered|string|max:100')]
    public $reg_number = '';

    public $parentId = null;

    public function mount($event)
    {
        $this->$event = $event;
        // Initialize with one attendee input
        $this->attendees = [
            ['name' => '', 'phone' => '', 'email' => '']
        ];

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

    public function updateUserRegistrationStatus()
    {
        $this->singleTicketPrice = $this->event->getAvailableFeesList()[$this->registrationStatus]['amount'];
        $this->dispatch('update-registration-status');

    }

    #[On('update-attendees')]
    #[On('update-registration-status')]
    public function updateTotalPrice()
    {
        $this->totalPrice = $this->singleTicketPrice * $this->ticketCounts;
    }


    public function render()
    {
        return view('livewire.create-event-booking');
    }

    public function store()
    {
        $this->updateTotalPrice();
        $validatedData = $this->validate();

        $this->booking = EventBooking::create([
            'attendees' => $validatedData['attendees'],
            'user_id' => auth()->id(),
            'event_id' => $this->event->id,
            'total_amount' => $validatedData['totalPrice'],
            'attendee_count' => count($validatedData['attendees']),
        ]);
    }
}
