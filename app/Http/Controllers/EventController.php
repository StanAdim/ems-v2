<?php

namespace App\Http\Controllers;
use App\Models\EventModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            function (Request $request, Closure $next) {
                $event = EventModel::latest()->first();
                if (!$event) {
                    return redirect(route('site_index'));
                }

                return $next($request);
            }
        );
    }

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

    public function exhibitor(EventModel $event): View
    {
        return view('exhibitor');
    }

    public function login(): View
    {
        return view('participant.login');
    }
}