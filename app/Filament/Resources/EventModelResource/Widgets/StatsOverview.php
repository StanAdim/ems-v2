<?php

namespace App\Filament\Resources\EventModelResource\Widgets;

use App\Enums\EventState;
use App\Enums\PaymentOrderStatus;
use App\Models\EventModel;
use App\Models\PaymentOrder;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $eventStats = EventModel::selectRaw(<<<SQL
        COUNT(CASE WHEN state IN (?, ?) THEN 1 END) AS active_events
        SQL,
            [
                EventState::Participation,
                EventState::ParticipationAndRegistration,
            ]
        )->first();

        $paymentStats = PaymentOrder::selectRaw(<<<SQL
        COUNT(CASE WHEN status = ? THEN 1 END) AS unpaid_payment_orders,
        SUM(CASE WHEN status = ? THEN total_amount END) AS total_revenue
        SQL,
            [
                PaymentOrderStatus::Pending,
                PaymentOrderStatus::Paid,
            ]
        )->first();

        return [
            Stat::make('Ongoing events', Number::abbreviate($eventStats['active_events'] ?? 0)),
            Stat::make('Unpaid payment orders', Number::abbreviate($paymentStats['unpaid_payment_orders'] ?? 0)),
            Stat::make('Revenue earned', Number::currency($paymentStats['total_revenue'] ?? 0, 'TZS')),
        ];
    }
}
