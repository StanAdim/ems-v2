<?php

namespace App\Filament\Imports;

use App\Models\Country;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CountryImporter extends Importer
{
    protected static ?string $model = Country::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('num_code')
                ->requiredMapping()
                ->rules(['required', 'numeric']),
            ImportColumn::make('alpha_2_code')
                ->requiredMapping()
                ->rules(['required', 'max:2', 'min:2']),
            ImportColumn::make('alpha_3_code')
                ->requiredMapping()
                ->rules(['required', 'min:3', 'max:3']),
            ImportColumn::make('en_short_name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('nationality')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Country
    {
        return Country::firstOrNew([
            // Update existing records, matching them by `$this->data['column_name']`
            'alpha_3_code' => $this->data['alpha_3_code'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your nationality import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
