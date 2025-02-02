<?php

namespace App\Listeners;

use App\Events\PaymentOrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;

class InitiateCallbacksOnPaidPaymentOrders implements ShouldQueue
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
        $paymentOrder->model_class::onPaid($paymentOrder);
    }
}
