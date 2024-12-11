<?php

namespace App\Filament\Resources\EventModelResource\Pages;

use App\Filament\Resources\EventModelResource;
use App\Models\EventModel;
use App\Models\JSON\Booth;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventModel extends EditRecord
{
    protected static string $resource = EventModelResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
            Actions\ReplicateAction::make()
                ->excludeAttributes([
                    'startsOn',
                    'endsOn',
                ])
                ->beforeReplicaSaved(function (EventModel $replica): void {
                    $replica->startsOn = now();
                    $replica->endsOn = now();

                    $replica->exhibition_booths = $replica
                        ->exhibition_booths
                        ->map(function (Booth $b) {
                            $b->booking_id = null;
                            return $b;
                        });
                })
                ->successRedirectUrl(function (EventModel $replica): string {
                    return route('filament.events.resources.event-models.edit', [
                        'record' => $replica,
                    ]);
                }),
        ];

        return $actions;
    }
}
