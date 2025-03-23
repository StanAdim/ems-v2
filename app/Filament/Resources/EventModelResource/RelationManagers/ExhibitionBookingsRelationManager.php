<?php

namespace App\Filament\Resources\EventModelResource\RelationManagers;

use App\Filament\Resources\PaymentOrderResource\Pages\EditPaymentOrder;
use App\Models\ExhibitionBooking;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Actions\Action as InfoListAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint\Operators\IsRelatedToOperator;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExhibitionBookingsRelationManager extends RelationManager
{
    protected static string $relationship = 'exhibition_bookings';

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
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('order_number')
                    ->sortable(),
                Tables\Columns\TextColumn::make('booth_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('booth_size')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->money('TSHS')
                    ->sortable(),

                Tables\Columns\TextColumn::make('payment_order.status')
                    ->label('Payment Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_order.control_no')
                    ->label('Payment Control No.')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->modal()->recordTitle(function (ExhibitionBooking $m) {
                    return 'Exhbition Booking for ' . $m->booth_name;
                }),
            ])
            ->filters([
                QueryBuilder::make()
                    ->constraints([
                        DateConstraint::make('created_at'),
                        RelationshipConstraint::make('payment_order') // Filter the `creator` relationship
                            ->selectable(
                                IsRelatedToOperator::make()
                                    ->titleAttribute('status')
                                    ->multiple(),
                            )
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public function infolist(Infolist $infoList): Infolist
    {
        return $infoList
            ->schema([
                Section::make('Details')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('order_number'),
                        TextEntry::make('booth_name'),
                        TextEntry::make('booth_size'),
                        TextEntry::make('created_at')->dateTime(),
                        TextEntry::make('bookedBy.name'),
                        TextEntry::make('bookedBy.profile.institution_name')
                            ->label('Institution Name'),
                    ]),
                Section::make('Attendees')
                    ->schema([
                        RepeatableEntry::make('attendees')
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('phone'),
                                TextEntry::make('email'),
                            ]
                            )->columns(3)
                            ->label(''),
                    ])
                    ->collapsed()
                    ->label('Delegates/Participants'),
                Section::make('Payment Information')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('total')->money('TSHS'),
                        TextEntry::make('payment_order.status')->label('Payment Status'),
                        TextEntry::make('payment_order.control_no')->label('Payment Control No.'),
                    ])
                    ->headerActions([
                        InfoListAction::make('goToPaymentOrder')
                            ->icon('heroicon-o-arrow-right-circle')
                            ->url(function (ExhibitionBooking $booking) {
                                return EditPaymentOrder::getUrl(['record' => $booking->id]);
                            }, true)
                            ->link(),
                    ]),
            ])
            ->columns(1);
    }
}
