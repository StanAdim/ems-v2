<?php

namespace App\Filament\Resources;

use App\Filament\Imports\CountryImporter;
use App\Filament\Resources\NationalityResource\Pages;
use App\Filament\Resources\NationalityResource\RelationManagers;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('num_code')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('alpha_2_code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alpha_3_code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('en_short_name')
                    ->required()
                    ->maxLength(512),
                Forms\Components\TextInput::make('nationality')
                    ->required()
                    ->maxLength(512),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('num_code')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alpha_2_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alpha_3_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('en_short_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nationality')
                    ->searchable(),
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
            ])
            ->headerActions([
                ImportAction::make()
                    ->importer(CountryImporter::class)
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
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
