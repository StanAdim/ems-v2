<?php

namespace App\Observers;

use App\Events\PaymentOrderPosted;
use App\Mail\PaymentOrderInvoiceMail;
use App\Models\PaymentOrder;
use Carbon\Carbon;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Invoice;
use Mail;

class PaymentOrderObserver
{

    /**
     * Handle the PaymentOrder "created" event.
     */
    public function created(PaymentOrder $paymentOrder): void
    {
        $paymentOrder->expires_on = Carbon::now()->addWeeks(1);
        $paymentOrder->save();

        PaymentOrderPosted::dispatch($paymentOrder);
    }

    /**
     * Handle the PaymentOrder "updated" event.
     */
    public function updated(PaymentOrder $paymentOrder): void
    {
        //
    }

    /**
     * Handle the PaymentOrder "deleted" event.
     */
    public function deleted(PaymentOrder $paymentOrder): void
    {
        //
    }

    /**
     * Handle the PaymentOrder "restored" event.
     */
    public function restored(PaymentOrder $paymentOrder): void
    {
        //
    }

    /**
     * Handle the PaymentOrder "force deleted" event.
     */
    public function forceDeleted(PaymentOrder $paymentOrder): void
    {
        //
    }
}
