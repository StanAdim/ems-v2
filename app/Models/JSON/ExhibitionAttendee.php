<?php

namespace App\Models\JSON;
use App\Contracts\Billable;
use App\Models\ExhibitionBooking;
use App\Models\PaymentOrder;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Livewire\Wireable;


class ExhibitionAttendee implements Arrayable, Wireable
{
    function __construct(
        public ?string $name,
        public ?string $phone,
        public ?string $email,
        public ?int $exhibition_booking_id,
        public ?float $booking_price,
        public ?int $payment_order_id = null,
    ) {
    }

    public function booking(): ExhibitionBooking
    {
        return ExhibitionBooking::whereId($this->exhibition_booking_id)->first();
    }

    public function paymentOrder(): PaymentOrder
    {
        return PaymentOrder::whereId($this->payment_order_id)->first();
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'exhibition_booking_id' => $this->exhibition_booking_id,
            'payment_order_id' => $this->payment_order_id,
            'booking_price' => $this->booking_price,
        ];
    }

    public function toLivewire()
    {
        return $this->toArray();
    }

    public static function fromArray($value)
    {
        return new self(
            $value['name'],
            $value['phone'],
            $value['email'],
            $value['exhibition_booking_id'],
            $value['booking_price'] ?? 0,
            $value['payment_order_id'] ?? null,
        );
    }

    public static function fromLivewire($value)
    {
        return self::fromArray($value);
    }
}
