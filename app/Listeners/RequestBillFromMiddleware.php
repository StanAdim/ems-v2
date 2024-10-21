<?php

namespace App\Listeners;

use App\Events\PaymentOrderPosted;
use ErrorException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Log;

class RequestBillFromMiddleware implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function viaQueue(): string
    {
        return config('app.queues.control-numbers');
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentOrderPosted $event): void
    {
        $order = $event->paymentOrder;
        $customer = $order->customer_details->first();

        $data = [
            'uuid' => $order->uuid,
            'description' => $order->description,
            'phone_number' => $order->phone_number,
            'customer_name' => $customer['name'],
            'customer_email' => $customer['email'],
            'approved_by' => 'ICT Comission',
            'amount' => $order->total_amount,
            'ccy' => 'TZS',
            'payment_option' => 1,
            'status_code' => 1,
            'expires_at' => $order->expires_on,
        ];

        Log::info("\nRequesting bill from middleware...");

        /**
         * @var \Illuminate\Http\Client\Response $response
         */
        $response = Http::paymentMiddleware()->post(config('app.payment.middleware.billSubmissionUri'), $data);

        if ($response->clientError() || $response->serverError() || $response->failed()) {
            Log::error("Failed to post bill payment order", ['data' => $response->json()]);
            $data = json_encode($data);
            throw new ErrorException("Could not process event.\n Data: {$data}, Response: {$response->body()}");
        }

        Log::info("Bill request successfull.", ['response' => $response->json()]);
        $order->middleware_bill_data = $response->json();
        $order->save();
    }
}
