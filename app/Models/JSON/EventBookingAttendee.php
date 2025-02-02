<?php

namespace App\Models\JSON;
use App\Models\EventBooking;
use App\Models\User;
use Illuminate\Contracts\Support\Arrayable;
use Livewire\Wireable;


class EventBookingAttendee implements Arrayable, Wireable
{
    function __construct(
        public int $user_id,
        public string $name,
        public ?string $institution,
        public string $nationality,
        public string $reg_status,
        public ?string $reg_number,
        public float $price,
        public ?string $ticket_no,
        public ?int $event_booking_id,

    ) {
    }

    public function booking(): EventBooking
    {
        return EventBooking::whereId($this->event_booking_id)->first();
    }

    /**
     * @return \App\Models\User
     */
    public function user()
    {
        return User::whereId($this->user_id)->first();
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
            'institution' => $this->institution,
            'nationality' => $this->nationality,
            'reg_status' => $this->reg_status,
            'reg_number' => $this->reg_number,
            'price' => $this->price,
            'ticket_no' => $this->ticket_no,
            'email' => $this->user()->email,
            'event_booking_id' => $this->event_booking_id,
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
            $value['name'],
            $value['institution'] ?? null,
            $value['nationality'],
            $value['reg_status'],
            $value['reg_number'] ?? null,
            $value['price'],
            $value['ticket_no'] ?? null,
            $value['event_booking_id'] ?? null
        );
    }

    public static function fromLivewire($value)
    {
        return self::fromArray($value);
    }
}
