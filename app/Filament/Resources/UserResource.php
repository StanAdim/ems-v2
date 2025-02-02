<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Country;
use App\Models\User;
use App\Models\UserProfile;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()
                    ->schema([
                        Tab::make('Account Details')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Group::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('email')
                                            ->email()
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Select::make('gender')
                                            ->options([
                                                'Male' => 'Male',
                                                'Female' => 'Female',
                                            ])->required()
                                    ])
                                    ->columns(2),

                                Forms\Components\DateTimePicker::make('email_verified_at'),
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    ->default('password@1234')
                                    ->hiddenOn('edit')
                                    ->maxLength(255),
                                // Using Select Component
                                Forms\Components\Select::make('roles')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->searchable(),
                            ]),
                        Tab::make('Profile')
                            ->schema([
                                Group::make()
                                    ->relationship('profile')
                                    ->schema([
                                        Forms\Components\Select::make('registration_status')
                                            ->options(UserProfile::getRegistrationStatuses())
                                            ->native(false)
                                            ->required(),
                                        Forms\Components\TextInput::make('phone_number')
                                            ->tel()
                                            ->required()
                                            ->maxLength(32),
                                        Forms\Components\TextInput::make('institution_name')
                                            ->required()
                                            ->maxLength(128),
                                        Forms\Components\TextInput::make('position')
                                            ->required()
                                            ->maxLength(256),

                                        Forms\Components\Group::make()
                                            ->schema([
                                                Forms\Components\Select::make('nationality')
                                                    ->options(Country::getNationalities())
                                                    ->required()
                                                    ->searchable(),
                                                Forms\Components\TextInput::make('address.region')
                                                    ->required()
                                                    ->maxLength(128),
                                                Forms\Components\TextInput::make('address.district')
                                                    ->required()
                                                    ->maxLength(128),
                                                Forms\Components\TextInput::make('address.physical_address')
                                                    ->required()
                                                    ->maxLength(128),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),

                                        Forms\Components\Toggle::make('can_receive_notification')
                                            ->required(),
                                    ])
                                    ->columns(2),
                            ]),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
