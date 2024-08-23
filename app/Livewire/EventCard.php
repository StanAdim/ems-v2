<?php

namespace App\Livewire;

use Livewire\Component;

class EventCard extends Component
{
    public $title;
    public $location;
    public $image;
    public $route;

    public function mount($title, $location, $image, $route)
    {
        $this->title = $title;
        $this->location = $location;
        $this->image = $image;
        $this->route = $route;
    }
    
    public function render()
    {
        return view('livewire.event-card');
    }
}
