<?php

namespace App\Filament\Resources\EventModelResource\RelationManagers;

use App\Filament\Exports\EventReviewExporter;
use App\Models\EventReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'reviews';

    public function canCreate(): bool
    {
        return false;
    }

    public static function canViewForRecord($ownerRecord, $pageClass): bool
    {
        return true;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user.name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user.name')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('event.title')
                //     ->numeric()
                //     ->sortable(),
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
                    ->multiple()
                    ->default(EventReview::STATUS_UNDER_REVIEW),
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
            ])
            ->headerActions([
                ExportAction::make('export')
                    ->label('Export Reviews')
                    ->exporter(EventReviewExporter::class),
            ]);
    }

    public function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('user.name')
                    ->icon('heroicon-o-user'),
                TextEntry::make('rating')
                    ->icon('heroicon-o-star'),
                TextEntry::make('company_name'),
                TextEntry::make('company_role'),
                TextEntry::make('comment'),
                TextEntry::make('status'),
            ]);
    }
}
