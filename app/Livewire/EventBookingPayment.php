<?php

namespace App\Livewire;

use App\Models\EventBooking;
use App\Models\PaymentOrder;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EventBookingPayment extends Component
{
    public int $booking_id;
    public EventBooking $booking;
    public ?PaymentOrder $payment_order;
    public string $booking_type;
    #[Validate('required|string')]
    public string $phone_number;

    protected $casts = [
        'booking.attendees' => 'array',
    ];

    public function mount()
    {
        $this->booking = EventBooking::find($this->booking_id);
        $this->booking_type = $this->booking->type;
    }

    public function pay()
    {
        $this->payment_order = PaymentOrder::create([
            'booking_id' => $this->booking_id,
            'description' => "Payment for {{$this->booking->event->title}}",
            'total_amount' => $this->booking->total_amount,
            'phone_number' => $this->phone_number,
        ]);
    }

    public function render()
    {
        return view('livewire.event-booking-payment');
    }
}
