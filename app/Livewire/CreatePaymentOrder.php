<?php

namespace App\Livewire;

use App\Contracts\Billable;
use App\Models\Coupon;
use App\Models\EventBooking;
use App\Models\PaymentOrder;
use App\Rules\CouponValidation;
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

    #[Validate([
        // 'exists:coupons,code',
        new CouponValidation,
    ])]
    public ?string $coupon_codes = null;

    #[Locked]
    public ?float $coupon_amount_to_pay = null;

    protected $casts = [
        'booking.attendees' => 'array',
    ];

    public function applyCoupon()
    {
        $this->validateOnly('coupon_codes');
        $applied_amount = Coupon::apply(
            $this->coupon_codes,
            $this->billable->amount()
        );

        $this->coupon_amount_to_pay = $this->billable->amount() - $applied_amount;
    }

    public function pay()
    {
        $validated = $this->validate();

        $this->payment_order = PaymentOrder::make(
            $this->billable,
            $validated['phone_number'],
            auth()->id() ?? 1,
            [$validated['coupon_codes']],
        );
    }

    public function render()
    {
        return view('livewire.create-payment-order');
    }
}
