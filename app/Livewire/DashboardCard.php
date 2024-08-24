<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardCard extends Component
{
    public $title;
    public $description;
    public $route;
    public $count;

    public function mount($title, $description, $route, $count)
    {
        $this->title = $title;
        $this->description = $description;
        $this->route = $route;
        $this->count = $count;
    }


    public function render()
    {
        return view('livewire.dashboard-card');
    }
}
