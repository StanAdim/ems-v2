<?php

namespace App\Http\Controllers;
use App\Models\EventModel;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(?EventModel $event = null): View
    {
        $event = $event ?: EventModel::latest()->first();
        return view('index', [
            'event' => $event,
        ]);
    }

    public function participant(EventModel $event): View
    {
        return view('participant', [
            'event' => $event,
        ]);
    }

    public function about(EventModel $event): View
    {
        return view('about', [
            'event' => $event,
        ]);
    }

    public function login(): View
    {
        return view('participant.login');
    }
}
