<?php

namespace App\Filament\Imports;

use App\Models\Member;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MemberImporter extends Importer
{
    protected static ?string $model = Member::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('registered_on')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('registration_number')
                ->requiredMapping()
                ->rules(['required', 'string']),
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('employer'),
            ImportColumn::make('professional_category')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('area_of_specialization'),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required'])
                ->array('/'),
            ImportColumn::make('phone_number')
                ->requiredMapping()
                ->rules(['required'])
                ->array('/'),

        ];
    }

    public function resolveRecord(): ?Member
    {
        return Member::firstOrNew([
            'registration_number' => $this->data['registration_number'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your member import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }

    public function getJobRetryUntil(): \Carbon\CarbonInterface|null
    {
        return now()->addMinutes(10);
    }
}
