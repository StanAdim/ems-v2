<?php

namespace App\Filament\Resources\EventModelResource\Pages;

use App\Filament\Resources\EventModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventModel extends EditRecord
{
    protected static string $resource = EventModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
