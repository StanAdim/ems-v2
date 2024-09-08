<?php

namespace App\Livewire;

use App\Models\EventModel;
use App\Models\ExhibitionBooking;
use App\Models\JSON\Booth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;

/**
 * Summary of MakeEventExhibitionBooking
 * @property EventModel $event
 * @property ExhibitionBooking $exhibitionBooking
 */
class MakeEventExhibitionBooking extends Component
{

    public $parentId;

    #[Locked]
    public $eventId;

    #[Locked]
    public $exhibitionBookingId;

    #[Computed]
    public function event()
    {
        return EventModel::findOrFail($this->eventId);
    }

    #[Computed]
    public function exhibitionBooking()
    {
        return ExhibitionBooking::find($this->exhibitionBookingId);
    }

    public ?string $booth_name = null;

    public function render()
    {
        return view('livewire.make-event-exhibition-booking');
    }

    public function store()
    {
        $validated = $this->validate(
            [
                'booth_name' => [
                    'required',
                    'string',
                    Rule::in($this->event->exhibition_booths->map(fn($item) => $item->name))
                ],
            ],
            [
                'booth_name' => 'You must select a booth before proceeding',
            ]
        );

        /** @var Booth $booth */
        $booth = $this->event
            ->exhibition_booths
            ->where('name', '==', $validated['booth_name'])
            ->first();

        $booking = ExhibitionBooking::makeFor(
            $this->event,
            [
                'booth_name' => $booth->name,
                'booth_size' => $booth->size,
                'total' => $booth->price,
            ]
        );

        if ($booking) {
            $this->exhibitionBookingId = $booking->id;
            $this->dispatch(
                'new-exhibition-booking',
                eventId: $this->eventId,
                bookingId: $booking->id
            );
        }
    }
}
