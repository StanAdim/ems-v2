<?php

namespace App\Http\Controllers\Api;

use App\Enums\PaymentOrderStatus;
use App\Events\ControlNoUpdated;
use App\Events\PaymentOrderPaid;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillControlNumberUpdateRequest;
use App\Http\Requests\BillPaymentStatusUpdateRequest;
use App\Models\PaymentOrder;
use Log;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
        $paymentOrder->middleware_bill_data = $validated['data'] ?? [];
        $paymentOrder->save();

        Log::info("Received Control Number, Control No: $controlNumber, Bill UUID: $uuid");

        ControlNoUpdated::dispatch($paymentOrder);

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

        $statusIsOkAndControlNoMatches = $validated['status'] && $paymentOrder->control_no == $validated['control_number'];
        if (!$statusIsOkAndControlNoMatches) {
            $validated = json_encode($validated);
            throw new BadRequestHttpException("Bill control_number  mismatch. Please Check if the control number you are sending is correct. Data: {$validated}");
        }

        $wasNotInitiallyPaid = $paymentOrder->status !== PaymentOrderStatus::Paid;

        $paymentOrder->status = PaymentOrderStatus::Paid;
        $paymentOrder->paid_amount = $validated['paid_amount'];
        $paymentOrder->middleware_bill_data = $validated['data'] ?? [];
        $paymentOrder->paid_at = now();
        $paymentOrder->save();

        Log::info("Updated Payment Status, Bill UUID: $uuid");

        if ($wasNotInitiallyPaid) {
            PaymentOrderPaid::dispatch($paymentOrder);
        }

        return [
            'status' => 'success',
        ];
    }
}
