<?php

namespace App\Livewire;

use App\Models\EventModel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewEventQuestion extends Component
{
    protected EventModel $event;

    #[Validate('required|max:255')]
    public string $message = '';

    public function render()
    {
        return view('livewire.new-event-question');
    }

    public function save()
    {
        $validated = $this->validate();

    }
}
