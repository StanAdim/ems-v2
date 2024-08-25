<?php

namespace App\Livewire;
use App\Models\EventModel;


use Livewire\Component;

class CreateEventBooking extends Component
{
    public $event;
    public $registeredPrice = 420000;
    public $nonRegisteredPrice = 500000;
    public $foreignPrice = 720000;
    public $singleTicketPrice = 0;
    public $ticketCounts = 1;
    public $registrationStatus = 'registered';

    public $count = 1; // To track the number of attendees
    public $attendees = []; // To store the attendee details

    public function mount($event)
    {
        $this->$event = $event;
        // Initialize with one attendee input
        $this->attendees = [
            ['name' => '', 'phone' => '', 'email' => '']
        ];
        // $this->updatedRegistrationStatus();

    }

    public function addAttendee()
    {
        $this->count++;
        $this->ticketCounts++;
        $this->attendees[] = ['name' => '', 'phone' => '', 'email' => ''];
    }

    public function removeAttendee($index)
    {
        if ($this->count > 1) {
            unset($this->attendees[$index]);
            $this->attendees = array_values($this->attendees); // Reindex the array
            $this->count--;
            $this->ticketCounts--;
        }
    }

    public function updatedRegistrationStatus($value)
    {
        if ($value == 'registered') {
            $this->singleTicketPrice = $this->registeredPrice;
        } else {
            $this->singleTicketPrice = $this->nonRegisteredPrice;
        }
    }

    public function getTotalPriceProperty()
    {
        return $this->singleTicketPrice * $this->ticketCounts;
    }

    public function calculateSingleTicketPrice()
    {
        $this->singleTicketPrice = $this->registeredPrice * $this->ticketCounts;
    }

    public function render()
    {
        return view('livewire.create-event-booking');
    }
}
