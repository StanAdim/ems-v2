<?php

namespace App\Models\JSON;
use App\Models\EventBooking;
use Illuminate\Contracts\Support\Arrayable;
use Livewire\Wireable;


class EventBookingAttendee implements Arrayable, Wireable
{
    function __construct(
        public ?string $name,
        public ?string $phone,
        public ?string $email,
        public ?string $ticket_no,
        public ?int $event_booking_id,
    ) {
    }

    public function booking(): EventBooking
    {
        return EventBooking::whereId($this->event_booking_id)->first();
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'ticket_no' => $this->ticket_no,
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
            $value['name'],
            $value['phone'],
            $value['email'],
            $value['ticket_no'] ?? null,
            $value['event_booking_id'],
        );
    }

    public static function fromLivewire($value)
    {
        return self::fromArray($value);
    }
}
