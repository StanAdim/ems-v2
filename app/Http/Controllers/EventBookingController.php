<?php

namespace App\Http\Controllers;

use App\Models\EventBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventBookingController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'attendees' => 'array',
            'attendees.*.name' => 'string|max:255',
            'attendees.*.phone' => 'string|max:15',
            'attendees.*.email' => 'email|max:255',
            'institution_name' => 'nullable|string|max:255',
            'nationality' => 'string|max:100',
            'registration_status' => 'string',
            'reg_number' => 'nullable|string|max:100',
            'ticketCounts' => 'integer|min:1',
            'total_amount' => 'numeric',
        ]);

        $eventBooking = EventBooking::create([
            'attendees' => json_encode($validatedData['attendees'] ??[]),
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
            'total_amount' => $validatedData['total_amount'],
            // 'payment_id' => 1, // Handle payment logic here if applicable
        ]);

        return redirect()->route('register', $request->event_id)->with('success', 'Registration successful!');
    }
}
