<?php

namespace App\Listeners;

use App\Events\PaymentOrderPaid;
use App\Mail\PaymentOrderPaidMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendPaymentNotificationToCustomer implements ShouldQueue
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
    public function handle(PaymentOrderPaid $event): void
    {
        $paymentOrder = $event->paymentOrder;
        $paymentOrder->generateInvoiceDocument();

        $emails = $paymentOrder
            ->customer_details
            ->map(fn($value) => $value['email']);

        foreach ($emails as $recepient) {
            Mail::to($recepient)
                ->send(new PaymentOrderPaidMail($paymentOrder));
        }
    }
}
