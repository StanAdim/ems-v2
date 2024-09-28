<?php

namespace App\Livewire;

use App\Contracts\Billable;
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
class CreatePaymentOrder extends Component
{
    #[Locked]
    public Billable $billable;
    public ?PaymentOrder $payment_order;

    #[Validate('required|string')]
    public string $phone_number;

    protected $casts = [
        'booking.attendees' => 'array',
    ];

    public function pay()
    {
        $this->payment_order = PaymentOrder::make(
            $this->billable,
            $this->phone_number,
            auth()->id() ?? 1
        );
    }

    public function render()
    {
        return view('livewire.create-payment-order');
    }
}
