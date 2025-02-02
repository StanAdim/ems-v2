<?php

namespace App\Listeners;

use App\Events\TicketCreated;
use App\Mail\TicketPurchasedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendTicketEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TicketCreated $event): void
    {
        $email = $event->ticket->user->email;
        Mail::to($email)->send(new TicketPurchasedMail($event->ticket));
    }
}
