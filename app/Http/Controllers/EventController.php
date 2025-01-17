<?php

namespace App\Http\Controllers;

use App\Models\EventBooking;
use App\Models\EventModel;
use App\Models\EventReview;
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
        $event = $event ?: EventModel::where('endsOn', '>', now())->latest()->first();
        if (!$event) {
            redirect(route('event.index'));
        }


        $reviews = EventReview::whereEventModelId($event?->id)
            ->whereStatus(EventReview::STATUS_APPROVED)
            ->paginate(3)
            ->withQueryString();
        $reviewStats = EventReview::whereEventModelId($event?->id)
            ->whereStatus(EventReview::STATUS_APPROVED)
            ->selectRaw("
                COUNT(CASE WHEN rating = 5 THEN 1 END) as five_stars,
                ROUND(LOG(COUNT(CASE WHEN rating = 5 THEN 1 END) + 1), 2) * 100 as five_stars_percent,
                COUNT(CASE WHEN rating = 4 THEN 1 END) as four_stars,
                ROUND(LOG(COUNT(CASE WHEN rating = 4 THEN 1 END) + 1), 2) * 100 as four_stars_percent,
                COUNT(CASE WHEN rating = 3 THEN 1 END) as three_stars,
                ROUND(LOG(COUNT(CASE WHEN rating = 3 THEN 1 END) + 1), 2) * 100 as three_stars_percent,
                COUNT(CASE WHEN rating = 2 THEN 1 END) as two_stars,
                ROUND(LOG(COUNT(CASE WHEN rating = 2 THEN 1 END) + 1), 2) * 100 as two_stars_percent,
                COUNT(CASE WHEN rating = 1 THEN 1 END) as one_stars,
                ROUND(LOG(COUNT(CASE WHEN rating = 1 THEN 1 END) + 1), 2) * 100 as one_stars_percent,
                ROUND(AVG(rating), 1) as average_rating,
                COUNT(*) as total_reviews
            ")
            ->first();

        return view('index', [
            'event' => $event,
            'reviews' => $reviews,
            'reviewStats' => $reviewStats,
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

    public function help(EventModel $event): View
    {

        return view('help', ['event' => $event]);
    }



}
