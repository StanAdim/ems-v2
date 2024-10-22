<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExhibitionBookingResource\Pages;
use App\Filament\Resources\ExhibitionBookingResource\RelationManagers;
use App\Models\ExhibitionBooking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExhibitionBookingResource extends Resource
{
    protected static ?string $model = ExhibitionBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('event_model_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('order_number')
                    ->required()
                    ->maxLength(128),
                Forms\Components\TextInput::make('booth_name')
                    ->required()
                    ->maxLength(128),
                Forms\Components\TextInput::make('booth_size')
                    ->required()
                    ->maxLength(128),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('payment_order_id')
                    ->relationship('payment_order', 'id')
                    ->default(null),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('attendees')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event_model_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('booth_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('booth_size')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_order.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
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
            'index' => Pages\ListExhibitionBookings::route('/'),
            'create' => Pages\CreateExhibitionBooking::route('/create'),
            'edit' => Pages\EditExhibitionBooking::route('/{record}/edit'),
        ];
    }
}
