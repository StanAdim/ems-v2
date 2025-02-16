<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriberRequest $request)
    {
        $validated = $request->validated();

        if (Subscriber::whereEmail($validated['email'])->exists()) {
            Subscriber::whereEmail($validated['email'])
                ->update(['unsubscribed_at' => null]);
        } else {
            Subscriber::create($validated);
        }

        return redirect(session()->previousUrl())
            ->with(
                'flash-message',
                $validated['email'] . ' has been added to the subscription list.'
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function unsubscribe(string $email)
    {
        Subscriber::whereEmail($email)->first()->unsubscribe();
        return redirect(session()->previousUrl())
            ->with(
                'flash-message',
                $email . ' has been removed from the subscription list.'
            );
    }
}
