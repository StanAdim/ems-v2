<?php

namespace App\Models\JSON;
use App\Contracts\Billable;
use App\Models\ExhibitionBooking;
use App\Models\PaymentOrder;
use App\Models\Ticket;
use Livewire\Wireable;


class ExhibitionAttendeeList implements Billable, Wireable
{
    /**
     *  @param \Illuminate\Support\Collection|\App\Models\JSON\ExhibitionAttendee[]|null $attendees
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
        return $this->attendees->sum(function (ExhibitionAttendee $attendee) {
            return $attendee->booking_price;
        });
    }

    public function customerDetails(): \Illuminate\Support\Collection
    {
        return $this->attendees->map(function (ExhibitionAttendee $attendee) {
            return [
                'name' => $attendee->user()->name,
                'email' => $attendee->user()->email,
            ];
        });
    }

    public function updateWithPaymentOrder(PaymentOrder $paymentOrder): void
    {
        $updatedAttendees = $this->attendees
            ->map(function (ExhibitionAttendee $attendee) use ($paymentOrder) {
                $attendee->payment_order_id = $paymentOrder->id;
                return $attendee;
            });

        $booking = $this->booking();
        $booking->attendees = $booking->attendees->concat($updatedAttendees);
        $booking->save();
        $updatedAttendees->count();
    }

    public function modelId(): string
    {
        return $this->bookingId;
    }

    public static function onPaid(PaymentOrder $paymentOrder): void
    {
        $booking = ExhibitionBooking::find($paymentOrder->model_id);

        // Find all attendees in this booking using this payment order
        $attendees = $booking
            ->attendees
            ->filter(function (ExhibitionAttendee $attendee) use ($paymentOrder) {
                return $attendee->payment_order_id === $paymentOrder->id;
            });

        // Find the original booking ticket so that we can use its ticket_code as the base of our new tickets
        $bookingTicket = Ticket::wherePaymentOrderId($booking->payment_order_id)->first();
        foreach ($attendees as $index => $attendee) {
            $code = $bookingTicket->ticket_code . '-' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            Ticket::make(
                $code,
                $booking->event,
                $attendee->user(),
                $paymentOrder
            );
        }
    }

    public static function modelClass(): string
    {
        return self::class;
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
