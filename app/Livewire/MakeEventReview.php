<?php

namespace App\Livewire;

use App\Models\EventModel;
use App\Models\EventReview;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

/**
 * Summary of EventReviews
 * @property EventModel $event
 */
class MakeEventReview extends Component
{
    #[Locked]
    public int $eventId;

    #[Computed()]
    public function event()
    {
        return EventModel::findOrFail($this->eventId);
    }

    #[Validate(['required', 'numeric', 'max:5', 'min:1'])]
    public $rating = 0.0;
    #[Validate(['required', 'string', 'max:512'])]
    public $comment = '';

    public function render()
    {
        return view('livewire.make-event-review');
    }

    public function store(): void
    {
        $validated = $this->validate();

        /**
         * @var \App\Models\User
         */
        $user = auth()->user();
        $review = new EventReview(
            $validated
            + [
                'full_name' => $user->name,
                'company_name' => $user->profile->institution_name,
                'company_role' => $user->profile->position,
                'event_model_id' => $this->eventId,
                'user_id' => $user->id,
                'status' => EventReview::STATUS_UNDER_REVIEW,
            ]
        );
        $review->save();
        $this->redirectRoute('event.index', ['event' => $this->eventId]);
    }
}
