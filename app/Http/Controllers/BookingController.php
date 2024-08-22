<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    protected $layout = 'layouts.app';

    public function event_booking(): View
    {

        return view('booking.event-booking', ['slot' => '']);
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

    public function question_and_answer(): View
    {

        return view('booking.question-and-answer', ['slot' => '']);
    }


}
