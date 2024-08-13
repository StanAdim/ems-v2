<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventModelRequest;
use App\Http\Requests\UpdateEventModelRequest;
use App\Models\EventModel;
use Illuminate\View\View;

class EventModelController extends Controller
{

    public function about(EventModel $event): View
    {
        return view('events.about', [
            'event' => $event
        ]);
    }

    public function participant(EventModel $event): View
    {
        return view('events.participant', [
            'event' => $event
        ]);
    }

}
