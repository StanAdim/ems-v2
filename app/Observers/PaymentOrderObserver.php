<?php

namespace App\Observers;

use App\Events\PaymentOrderPosted;
use App\Mail\PaymentOrderInvoice;
use App\Models\PaymentOrder;
use Carbon\Carbon;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Invoice;
use Mail;

class PaymentOrderObserver
{

    function generateUniqueNumber()
    {
        // Prefix
        $prefix = '992';

        // Generate 10 random digits
        $randomDigits = mt_rand(1000000000, 9999999999);

        // Combine prefix and random digits
        $uniqueNumber = $prefix . $randomDigits;

        return $uniqueNumber;
    }

    function generateInvoiceDocument(PaymentOrder $paymentOrder)
    {
        $seller = new Party(config('app.business'));

        $firstCustomer = $paymentOrder->customer_details->first();
        $emails = $paymentOrder->customer_details->map(fn($value) => $value['email']);

        $customer = new Buyer([
            'name' => $firstCustomer['name'],
            'custom_fields' => [
                'email' => $firstCustomer['email'],
            ],
        ]);

        $item = InvoiceItem::make($paymentOrder->description)->pricePerUnit($paymentOrder->total_amount);
        $invoice = Invoice::make($paymentOrder->control_no)
            ->seller($seller)
            ->buyer($customer)
            ->currencySymbol('TSHS')
            ->currencyCode('TSHS')
            ->currencyFormat('{SYMBOL} {VALUE}')
            ->currencyThousandsSeparator(',')
            ->payUntilDays(7)
            ->addItem($item);

        $invoice->save('public');

        $paymentOrder->invoice_url = $invoice->url();
        $paymentOrder->save();

        // foreach ($emails as $recepient) {
        //     Mail::to($recepient)
        //         ->send(new PaymentOrderInvoice($paymentOrder));
        // }
    }
    /**
     * Handle the PaymentOrder "created" event.
     */
    public function created(PaymentOrder $paymentOrder): void
    {
        // $paymentOrder->control_no = $this->generateUniqueNumber();
        $paymentOrder->expires_on = Carbon::now()->addWeeks(1);
        $paymentOrder->save();

        $this->generateInvoiceDocument($paymentOrder);
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
