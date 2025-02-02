<?php

namespace App\Contracts;
use App\Models\PaymentOrder;
use Illuminate\Support\Collection;

interface Billable
{
    public function descriptionLines(): array;
    public function description(): string;
    public function amount(): float;

    /**
     * Summary of customerDetails
     * with mappings for name and email
     */
    public function customerDetails(): Collection;
    public function updateWithPaymentOrder(PaymentOrder $paymentOrder): void;

    public static function modelClass(): string;
    public function modelId(): string;

    public static function onPaid(PaymentOrder $paymentOrder): void;
}
