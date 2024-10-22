<?php

namespace App\Filament\Resources\ExhibitionBookingResource\Pages;

use App\Filament\Resources\ExhibitionBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExhibitionBookings extends ListRecords
{
    protected static string $resource = ExhibitionBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
