<?php

namespace App\Filament\Resources\EventModelResource\Pages;

use App\Filament\Resources\EventModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventModels extends ListRecords
{
    protected static string $resource = EventModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
