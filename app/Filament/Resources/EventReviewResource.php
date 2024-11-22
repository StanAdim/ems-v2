<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventReviewResource\Pages;
use App\Filament\Resources\EventReviewResource\RelationManagers;
use App\Models\EventReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventReviewResource extends Resource
{
    protected static ?string $model = EventReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('user_id')
                //     ->relationship('user', 'name')
                //     ->required(),
                // Forms\Components\Select::make('event_model_id')
                //     ->relationship('event', 'title')
                //     ->required(),
                // Forms\Components\TextInput::make('rating')
                //     ->required()
                //     ->numeric(),
                // Forms\Components\TextInput::make('full_name')
                //     ->required()
                //     ->maxLength(256),
                // Forms\Components\TextInput::make('company_name')
                //     ->required()
                //     ->maxLength(256),
                // Forms\Components\TextInput::make('company_role')
                //     ->required()
                //     ->maxLength(256),
                // Forms\Components\TextInput::make('comment')
                //     ->required()
                //     ->maxLength(512),
                // Forms\Components\TextInput::make('status')
                //     ->required()
                //     ->maxLength(256),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options(EventReview::getStatuses()),
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
                SelectFilter::make('event')
                    ->relationship('event', 'linkTitle')
                    ->multiple(),
                SelectFilter::make('status')
                    ->options(EventReview::getStatuses())
                    ->multiple(),
                SelectFilter::make('rating')
                    ->options([
                        5 => 'Five Stars',
                        4 => 'Four Stars',
                        3 => 'Three Stars',
                        2 => 'Two Stars',
                        1 => 'One Star',
                    ])
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->modal(),
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
            'index' => Pages\ListEventReviews::route('/'),
            'create' => Pages\CreateEventReview::route('/create'),
            'edit' => Pages\EditEventReview::route('/{record}/edit'),
        ];
    }
}
