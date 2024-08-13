<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventModelResource\Pages;
use App\Filament\Resources\EventModelResource\RelationManagers;
use App\Models\EventModel;
use ArberMustafa\FilamentLocationPickrField\Forms\Components\LocationPickr;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventModelResource extends Resource
{
    protected static ?string $model = EventModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                Textarea::make('bannerText'),
                DateTimePicker::make('startsOn')->minutesStep(15)->seconds(false)->required(),
                DateTimePicker::make('endsOn')->minutesStep(15)->seconds(false)->required(),
                LocationPickr::make('location'),
                TextInput::make('locationDescription'),
                Textarea::make('aboutTitle'),
                Textarea::make('aboutDescription'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventModels::route('/'),
            'create' => Pages\CreateEventModel::route('/create'),
            'view' => Pages\ViewEventModel::route('/{record}'),
            'edit' => Pages\EditEventModel::route('/{record}/edit'),
        ];
    }
}
