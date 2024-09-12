<?php

namespace App\Models\JSON;
use App\Contracts\Billable;
use App\Models\ExhibitionBooking;
use Livewire\Wireable;


class AttendeeList implements Billable, Wireable
{
    /**
     *  @param \Illuminate\Support\Collection|\App\Models\JSON\Attendee[]|null $attendees
     */
    public function __construct(public int $bookingId, public $attendees)
    {
    }

    protected function booking()
    {
        return ExhibitionBooking::find($this->bookingId);
    }

    public function descriptionLines(): array
    {
        return [
            ["Booking No.", $this->booking()->order_number],
            ["Number of Attendees", count($this->attendees)],
        ];
    }

    public function description(): string
    {
        $count = count($this->attendees);
        return "{$count} Attendee(s) booking payment for Booking No. {$this->booking()->order_number}";
    }

    public function amount(): float
    {
        return $this->attendees->sum(function (Attendee $attendee) {
            return $attendee->booking_price;
        });
    }

    public function customerDetails(): \Illuminate\Support\Collection
    {
        return $this->attendees->map(function (Attendee $attendee) {
            return [
                'name' => $attendee->name,
                'email' => $attendee->email,
            ];
        });
    }

    public function updateWithPaymentOrder(\App\Models\PaymentOrder $paymentOrder): void
    {
        $updatedAttendees = $this->attendees
            ->map(function (Attendee $attendee) use ($paymentOrder) {
                $attendee->payment_order_id = $paymentOrder->id;
                return $attendee;
            });

        $booking = $this->booking();
        $booking->attendees = $booking->attendees->concat($updatedAttendees);
        $booking->save();
        $updatedAttendees->count();
    }

    public function toLivewire()
    {
        return [
            'bookingId' => $this->bookingId,
            'attendees' => $this->attendees,
        ];
    }

    public static function fromLivewire($value)
    {
        return new self(
            $value['bookingId'],
            $value['attendees']
        );
    }
}
