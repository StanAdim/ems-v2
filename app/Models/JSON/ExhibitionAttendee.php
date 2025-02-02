<?php

namespace App\Models\JSON;
use App\Models\ExhibitionBooking;
use App\Models\PaymentOrder;
use App\Models\User;
use Illuminate\Contracts\Support\Arrayable;
use Livewire\Wireable;


class ExhibitionAttendee implements Arrayable, Wireable
{
    public function __construct(
        public ?string $user_id,
        public ?int $exhibition_booking_id,
        public ?string $name,
        public ?string $nationality,
        public ?string $reg_status,
        public ?string $reg_number,
        public ?float $booking_price,
        public ?int $payment_order_id = null,
        public ?int $ticket_id = null,
    ) {
    }

    public function booking(): ExhibitionBooking
    {
        return ExhibitionBooking::whereId($this->exhibition_booking_id)->first();
    }

    /**
     * @return \App\Models\User
     */
    public function user()
    {
        return User::whereId($this->user_id)->first();
    }

    public function paymentOrder(): PaymentOrder
    {
        return PaymentOrder::whereId($this->payment_order_id)->first();
    }


    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'exhibition_booking_id' => $this->exhibition_booking_id,
            'name' => $this->name,
            'nationality' => $this->nationality,
            'reg_status' => $this->reg_status,
            'reg_number' => $this->reg_number,
            'booking_price' => $this->booking_price,
            'payment_order_id' => $this->payment_order_id,
        ];
    }

    public function toLivewire()
    {
        return $this->toArray();
    }

    public static function fromArray($value)
    {
        return new self(
            $value['user_id'],
            $value['exhibition_booking_id'],
            $value['name'],
            $value['nationality'],
            $value['reg_status'],
            $value['reg_number'],
            $value['booking_price'],
            $value['payment_order_id'] ?? null,
        );
    }

    public static function fromLivewire($value)
    {
        return self::fromArray($value);
    }
}
