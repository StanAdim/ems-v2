<?php

namespace App\Filament\Resources\EventModelResource\Pages;

use App\Filament\Resources\EventModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventModel extends ViewRecord
{
    protected static string $resource = EventModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
