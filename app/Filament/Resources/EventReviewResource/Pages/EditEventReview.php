<?php

namespace App\Filament\Resources\EventReviewResource\Pages;

use App\Filament\Resources\EventReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventReview extends EditRecord
{
    protected static string $resource = EventReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
