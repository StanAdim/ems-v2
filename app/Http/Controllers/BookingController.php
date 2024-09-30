<?php

namespace App\Http\Controllers;

use App\Enums\PaymentOrderStatus;
use App\Models\EventModel;
use Illuminate\View\View;

class BookingController extends Controller
{
    protected $layout = 'layouts.app';

    public function dashboard(): View
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $myBookingsCount = $user->bookings()->count();
        $myExhibitionsCount = $user->exhibitions()->count();

        $payableModel = $user->canExhibit() ? $user->exhibitions : $user->bookings;
        $pendingPaymentsCount = $payableModel->reduce(function (?int $carry, $p) {
            $carry += ($p->payment_order?->status == PaymentOrderStatus::Pending) ? 1 : 0;
            return $carry;
        });
        $activeEvents = EventModel::count();

        $upcomingEvents = EventModel::where('endsOn', '>', now())->get();

        return view('dashboard', [
            'myBookingCount' => $myBookingsCount,
            'myExhibitionsCount' => $myExhibitionsCount,
            'pendingPaymentsCount' => $pendingPaymentsCount ?? 0,
            'activeEvents' => $activeEvents,
            'slot' => '',
            'upcomingEvents' => $upcomingEvents->map(function (EventModel $event) {
                return [
                    'event' => $event,
                    'title' => $event->title,
                    'location' => $event->locationDescription,
                    'imageUrl' => $event->getMainBannerUrl(),
                    'model' => $event,
                    'route' => route('event-booking', ['id' => $event->id]),
                ];
            })->toArray()
        ]);
    }

    public function event_booking(): View
    {
        $upcomingEvents = EventModel::where('endsOn', '>', now())->get();
        return view('booking.event-booking', [
            'slot' => '',
            'upcomingEvents' => $upcomingEvents->map(function (EventModel $event) {
                return [
                    'event' => $event,
                    'title' => $event->title,
                    'location' => $event->locationDescription,
                    'imageUrl' => $event->getMainBannerUrl(),
                    'model' => $event,
                    'route' => route('event-booking', ['id' => $event->id]),
                ];
            })->toArray()
        ]);
    }

    public function my_booking(): View
    {

        return view('booking.my-booking', ['slot' => '']);
    }

    public function individual_booking(): View
    {

        return view('booking.individual-booking', ['slot' => '']);
    }

    public function group_booking(): View
    {

        return view('booking.group-booking', ['slot' => '']);
    }

    public function exhibition_booking(): View
    {

        return view('booking.exhibition-booking', ['slot' => '']);
    }

    public function event_material(): View
    {

        return view('booking.event-material', ['slot' => '']);
    }

    public function question_and_answer(?EventModel $event = null): View
    {
        $activeEvents = $event
            ? collect([])
            : EventModel::where('endsOn', '>', now())->get();

        return view('booking.question-and-answer', [
            'slot' => '',
            'event' => $event,
            'activeEvents' => $activeEvents->map(function (EventModel $e) {
                return (object) [
                    'event' => $e,
                    'title' => $e->title,
                    'location' => $e->locationDescription,
                    'imageUrl' => $e->getMainBannerUrl(),
                    'model' => $e,
                    'route' => route('question-and-answer', ['event' => $e->id]),
                ];
            })->toArray(),
        ]);
    }
}
