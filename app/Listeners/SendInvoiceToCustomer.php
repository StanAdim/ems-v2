<?php

namespace App\Listeners;

use App\Events\ControlNoUpdated;
use App\Mail\PaymentOrderInvoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendInvoiceToCustomer implements ShouldQueue
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
    public function handle(ControlNoUpdated $event): void
    {
        $paymentOrder = $event->paymentOrder;
        $paymentOrder->generateInvoiceDocument();

        $emails = $paymentOrder
            ->customer_details
            ->map(fn($value) => $value['email']);

        foreach ($emails as $recepient) {
            Mail::to($recepient)
                ->send(new PaymentOrderInvoice($paymentOrder));
        }
    }
}
