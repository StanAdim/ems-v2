<?php

namespace App\Http\Controllers\Api;

use App\Enums\PaymentOrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillControlNumberUpdateRequest;
use App\Http\Requests\BillPaymentStatusUpdateRequest;
use App\Models\PaymentOrder;
use Log;

class BillingController extends Controller
{

    /**
     * Update the specified payment order with GEPG Information.
     */
    public function updateControlNo(BillControlNumberUpdateRequest $request, string $uuid)
    {

        $paymentOrder = PaymentOrder::whereUuid($uuid)->firstOrFail();
        $validated = $request->validated();

        $controlNumber = $validated['control_number'];
        $paymentOrder->control_no = $controlNumber;
        $paymentOrder->save();

        Log::info("Received Control Number, Control No: $controlNumber, Bill UUID: $uuid");

        return [
            'status' => 'success',
        ];

    }

    /**
     * Update the specified payment order with Payment status
     */
    public function updatePaymentStatus(BillPaymentStatusUpdateRequest $request, string $uuid)
    {
        $paymentOrder = PaymentOrder::whereUuid($uuid)->firstOrFail();
        $validated = $request->validated();

        if ($validated['is_paid']) {
            $paymentOrder->status = PaymentOrderStatus::Paid;
            $paymentOrder->save();
        }

        Log::info("Updated Payment Status, Bill UUID: $uuid");

        return [
            'status' => 'success',
        ];
    }
}
