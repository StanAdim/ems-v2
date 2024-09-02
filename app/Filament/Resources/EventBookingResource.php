<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventBookingResource\Pages;
use App\Filament\Resources\EventBookingResource\RelationManagers;
use App\Models\EventBooking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventBookingResource extends Resource
{
    protected static ?string $model = EventBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square-stack';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('attendees')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('event_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->sortable(),
                ViewColumn::make('attendees')->view('tables.columns.attendees-column'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->money('TSHS')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->modal(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infoList): Infolist
    {
        return $infoList
            ->schema([
                RepeatableEntry::make('attendees')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('phone'),
                        TextEntry::make('email'),
                    ])->columns(3),
                TextEntry::make('total_amount')->money('TSHS'),
                TextEntry::make('created_at')->dateTime(),
            ])->columns(1);
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
            'index' => Pages\ListEventBookings::route('/'),
        ];
    }
}
