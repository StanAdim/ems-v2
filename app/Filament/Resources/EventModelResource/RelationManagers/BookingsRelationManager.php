<?php

namespace App\Filament\Resources\EventModelResource\RelationManagers;

use App\Enums\PaymentOrderStatus;
use App\Filament\Exports\EventBookingExporter;
use App\Filament\Resources\PaymentOrderResource;
use App\Models\EventBooking;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Actions\Action as InfoListAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint\Operators\IsRelatedToOperator;
use Filament\Tables\Filters\QueryBuilder\Constraints\SelectConstraint;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingsRelationManager extends RelationManager
{
    protected static string $relationship = 'bookings';

    public function canCreate(): bool
    {
        return false;
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
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('type')
                    ->state(function (EventBooking $record) {
                        return $record::getTypeList()[$record->type];
                    })
                    ->sortable(),
                ViewColumn::make('attendees')
                    ->view('tables.columns.attendees-column')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
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
                Tables\Actions\ViewAction::make()->modal()->recordTitle(function (EventBooking $m) {
                    return 'Booking for ' . $m->event->linkTitle;
                }),
            ])
            ->filters([
                Filter::make('ticket_filter')
                    ->form([
                        TextInput::make('ticket_no')
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when(
                                $data['ticket_no'],
                                fn(Builder $query, $ticket_no) => $query->whereJsonContains(
                                    'attendees->ticket_no',
                                    $ticket_no
                                )
                            );
                    }),
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
                    Tables\Actions\ExportBulkAction::make()
                        ->exporter(EventBookingExporter::class),
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
                        TextEntry::make('type')->state(function (EventBooking $record) {
                            return $record::getTypeList()[$record->type];
                        }),
                        TextEntry::make('created_at')->dateTime(),
                    ]),
                Section::make('Attendees')
                    ->schema([
                        RepeatableEntry::make('attendees')
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('institution'),
                                TextEntry::make('nationality'),
                                TextEntry::make('reg_status')->label('Registration Status'),
                                TextEntry::make('reg_number')->label('Registration Number'),
                                TextEntry::make('price'),
                                TextEntry::make('ticket_no'),
                            ])
                            ->label('')
                            ->columns(4),
                    ]),
                Section::make('Payment Information')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('total_amount')->money('TSHS'),
                        TextEntry::make('payment_order.status')->label('Payment Status'),
                        TextEntry::make('payment_order.control_no')->label('Payment Control No.'),
                    ])
                    ->headerActions([
                        InfoListAction::make('goToPaymentOrder')
                            ->icon('heroicon-o-arrow-right-circle')
                            ->url(function (EventBooking $booking) {
                                return PaymentOrderResource\Pages\EditPaymentOrder::getUrl(['record' => $booking->id]);
                            }, true)
                            ->link(),
                    ]),
            ])
            ->columns(1);
    }
}
