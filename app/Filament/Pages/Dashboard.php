<?php

namespace App\Filament\Pages;

use App\Filament\Resources\EventModelResource\Widgets\StatsOverview;
use Filament\Pages\Page;
use Illuminate\Contracts\View\View;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = "Dashboard";

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::make(),
        ];
    }

}
