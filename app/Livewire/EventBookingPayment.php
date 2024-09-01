<?php

namespace App\Livewire;

use App\Models\EventBooking;
use App\Models\PaymentOrder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

/**
 * Summary of EventBookingPayment
 *
 * @property EventBooking $booking
 */
class EventBookingPayment extends Component
{
    #[Locked]
    public int $booking_id;
    public ?PaymentOrder $payment_order;

    #[Locked]
    public string $booking_type;

    #[Validate('required|string')]
    public string $phone_number;

    protected $casts = [
        'booking.attendees' => 'array',
    ];

    public function mount()
    {
        $this->booking_type = $this->booking->type;
    }

    #[Computed]
    public function booking()
    {
        return EventBooking::find($this->booking_id);
    }

    public function pay()
    {
        $this->payment_order = PaymentOrder::create([
            'description' => "{$this->booking->event->title} ({$this->booking->type})",
            'total_amount' => $this->booking->total_amount,
            'phone_number' => $this->phone_number,
            'customer_details' => $this->booking->attendees,
        ]);
        $this->booking->payment_order_id = $this->payment_order->id;
        $this->booking->save();
    }

    public function render()
    {
        return view('livewire.event-booking-payment');
    }
}
