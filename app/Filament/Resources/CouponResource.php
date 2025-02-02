<?php

namespace App\Filament\Resources;

use App\Enums\EventState;
use App\Filament\Resources\CouponResource\Pages;
use App\Filament\Resources\CouponResource\RelationManagers;
use App\Models\Coupon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_model_id')
                    ->relationship(
                        name: 'event',
                        titleAttribute: 'linkTitle',
                        modifyQueryUsing: fn(Builder $query) => $query->whereIn(
                            'state',
                            [
                                EventState::Registration,
                                EventState::ParticipationAndRegistration,
                            ]
                        ),
                    )
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255)
                    ->suffixAction(
                        Forms\Components\Actions\Action::make('generateCode')
                            ->icon('heroicon-m-cog-6-tooth')
                            ->requiresConfirmation()
                            ->action(function (Set $set, $state) {
                                $set('code', Coupon::generateCouponCode());
                            })
                    ),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('discount_type')
                    ->required()
                    ->options(Coupon::getDiscountTypes())
                    ->native(false),
                Forms\Components\TextInput::make('discount_value')
                    ->required()
                    ->numeric()
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->minValue(0.1)
                    ->rules([
                        fn(Forms\Get $get) => function ($attribute, $value, $fail) use ($get) {
                            if ($get('discount_type') === Coupon::DISCOUNT_TYPE_PERCENTAGE && $value > 100) {
                                $fail("The {$attribute} can not exceed 100%.");
                            }
                        }
                    ]),
                Forms\Components\TextInput::make('min_order_amount')
                    ->required()
                    ->numeric()
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->minValue(0.1),
                Forms\Components\TextInput::make('max_discount_amount')
                    ->required()
                    ->numeric()
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->minValue(0.1),
                Forms\Components\TextInput::make('usage_limit')
                    ->required()
                    ->numeric()
                    ->default(1)
                    ->step(1),
                Forms\Components\TextInput::make('usage_count')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->readOnly(true),
                Forms\Components\DateTimePicker::make('expires_at')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('discount_type'),
                Tables\Columns\TextColumn::make('discount_value')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('min_order_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_discount_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('usage_limit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('usage_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active'),
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
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
