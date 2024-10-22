<?php

namespace App\Filament\Resources\ExhibitionBookingResource\Pages;

use App\Filament\Resources\ExhibitionBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExhibitionBooking extends EditRecord
{
    protected static string $resource = ExhibitionBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
