<?php

namespace App\Observers;

use App\Models\EventBooking;
use Str;

class EventBookingObserver
{
    public function generateTicketNumber($eventShortName, $id)
    {
        // Example: 'TAIC-000000012'
        return "$eventShortName-" . /* date('Ymd') . '-' .  */ Str::padLeft($id, 9, '0');
    }

    /**
     * Handle the EventBooking "created" event.
     */
    public function created(EventBooking $booking): void
    {
        $eventShortName = Str::of($booking->event->linkTitle)
            ->studly()
            ->upper();

        $updatedAttendees = $booking
            ->attendees
            ->mapWithKeys(function (array $a, int $key) use ($eventShortName, $booking) {
                $id = $booking->id . (++$key);
                $ticket_no = $this->generateTicketNumber($eventShortName, $id);
                $a['ticket_no'] = $ticket_no;

                return $a;
            });

        $booking->update([
            'attendees' => $updatedAttendees,
        ]);
    }
}
