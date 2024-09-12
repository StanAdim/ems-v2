<?php

namespace App\Http\Controllers;

use App\Models\EventBooking;
use App\Models\EventModel;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('exhibitor.index', [
            'event' => $event,
        ]);
    }

    public function login(): View
    {
        return view('participant.login');
    }

    public function sponsor(EventModel $event): View
    {

        return view('sponsor', ['event' => $event]);
    }

    public function hospitality_tours(EventModel $event): View
    {

        return view('hospitality-and-tours', ['event' => $event]);
    }


}
