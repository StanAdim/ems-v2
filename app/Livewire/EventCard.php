<?php

namespace App\Livewire;

use Livewire\Component;

class EventCard extends Component
{
    public $title;
    public $location;
    public $imageUrl;
    public $route;

    public function mount($title, $location, $imageUrl, $route)
    {
        $this->title = $title;
        $this->location = $location;
        $this->imageUrl = $imageUrl;
        $this->route = $route;
    }

    public function render()
    {
        return view('livewire.event-card');
    }
}
