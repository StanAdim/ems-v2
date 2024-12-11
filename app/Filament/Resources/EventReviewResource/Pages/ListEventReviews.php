<?php

namespace App\Filament\Resources\EventReviewResource\Pages;

use App\Filament\Resources\EventReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventReviews extends ListRecords
{
    protected static string $resource = EventReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
