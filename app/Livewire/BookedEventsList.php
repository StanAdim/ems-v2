<?php

namespace App\Livewire;

use App\Enums\PaymentOrderStatus;
use App\Filament\Resources\EventBookingResource;
use App\Models\EventBooking;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as InfoListSection;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction as TableDeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\Action as TableAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class BookedEventsList extends Component implements HasForms, HasTable, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;
    use InteractsWithTable;

    protected static string $resource = EventBookingResource::class;
    public ?string $bookingType = null;

    public static function canCreate(): bool
    {
        return false;
    }

    public function table(Table $table): Table
    {
        $query = EventBooking::query()
            ->where('user_id', Auth::user()->id)
            ->whereType($this->bookingType);

        return $table
            ->query($query)
            ->columns([
                Tables\Columns\TextColumn::make('event.title')
                    ->searchable()
                    ->sortable(),
                ViewColumn::make('attendees')
                    ->view('tables.columns.attendees-column')
                    ->searchable()
                    ->label('Delegates/Participants'),

                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('payment_order.control_no')
                    ->label('Control No.')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable(),

                TextColumn::make('type')
                    ->state(fn(EventBooking $record) => $record::getTypeList()[$record->type]),
                TextColumn::make('payment_order.status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(PaymentOrderStatus $state): string => match ($state) {
                        PaymentOrderStatus::Paid => 'success',
                        PaymentOrderStatus::Pending => 'warning',
                        default => 'danger',
                    }),

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
                MultiSelectFilter::make('events')
                    ->relationship('event', 'linkTitle')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                TableAction::make('invoice')
                    ->url(function (EventBooking $record) {
                        return $record->payment_order?->invoice_url;
                    })
                    ->visible(function (EventBooking $record) {
                        return $record->payment_order?->invoice_url !== null;
                    })
                    ->icon('heroicon-o-document-arrow-down')
                    ->openUrlInNewTab(),
                TableAction::make('receipt')
                    ->url(function (EventBooking $record) {
                        return $record->payment_order?->receipt_url;
                    })
                    ->visible(function (EventBooking $record) {
                        return $record->payment_order?->receipt_url !== null;
                    })
                    ->icon('heroicon-o-document-arrow-down')
                    ->openUrlInNewTab(),
                ViewAction::make()
                    ->modal()
                    ->infolist(self::infolistSchema())
                    ->size(ActionSize::Small),
                TableDeleteAction::make()
                    ->requiresConfirmation()
                    ->visible(function (EventBooking $record) {
                        return !$record->payment_order?->isPaid();
                    })->size(ActionSize::Small),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public static function infolist(Infolist $infoList): Infolist
    {
        return $infoList
            ->schema(self::infolistSchema())
            ->columns(1);
    }

    public static function infolistSchema(): array
    {
        return [
            InfoListSection::make('Details')
                ->columns(2)
                ->schema([
                    TextEntry::make('type')->state(function (EventBooking $record) {
                        return $record::getTypeList()[$record->type];
                    }),
                    TextEntry::make('created_at')->dateTime(),
                ]),
            InfoListSection::make('Attendees')
                ->schema([
                    RepeatableEntry::make('attendees')
                        ->schema([
                            TextEntry::make('name'),
                            TextEntry::make('institution'),
                            TextEntry::make('nationality'),
                            TextEntry::make('reg_status')->label('Registration Status'),
                            TextEntry::make('reg_number')->label('Registration Number'),
                            TextEntry::make('price')->money('TSHS'),
                            TextEntry::make('ticket_no'),
                        ])
                        ->label('')
                        ->columns(4),
                ]),
            InfoListSection::make('Payment Information')
                ->columns(3)
                ->schema([
                    TextEntry::make('payment_order.description'),
                    TextEntry::make('payment_order.total_amount')->money('TSHS'),
                    TextEntry::make('payment_order.status')->label('Payment Status'),
                    TextEntry::make('payment_order.control_no')->label('Payment Control No.'),
                ]),
        ];
    }

    public function render(): View
    {
        return view('livewire.booked-events-list');
    }
}
