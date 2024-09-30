<?php

namespace App\Livewire;

use App\Models\EventModel;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

/**
 * Summary of EventQuestionAndAnswers
 *
 * @property EventModel $event
 */
class EventQuestionAndAnswers extends Component
{
    #[Locked]
    public $eventId;

    #[Computed]
    public function event(): EventModel
    {
        return EventModel::withCount('questions')->find($this->eventId);
    }

    public function render()
    {
        return view('livewire.event-question-and-answers');
    }
}
