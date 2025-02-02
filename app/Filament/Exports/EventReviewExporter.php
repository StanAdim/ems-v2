<?php

namespace App\Filament\Exports;

use App\Models\EventReview;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class EventReviewExporter extends Exporter
{
    protected static ?string $model = EventReview::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('user.name'),
            ExportColumn::make('event.name'),
            ExportColumn::make('rating'),
            ExportColumn::make('full_name'),
            ExportColumn::make('company_name'),
            ExportColumn::make('company_role'),
            ExportColumn::make('comment'),
            ExportColumn::make('status'),
            ExportColumn::make('created_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your event review export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
