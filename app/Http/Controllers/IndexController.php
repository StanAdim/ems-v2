<?php

namespace App\Http\Controllers;

use App\Models\EventModel;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $latestEvent = EventModel::latest()->first();
        return view('index', [
            'event' => $latestEvent,
        ]);
    }

    public function participant(): View
    {
        return view('participant');
    }

    public function about(): View
    {
        return view('about');
    }

    public function login(): View
    {
        return view('participant.login');
    }
}
