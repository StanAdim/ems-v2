<?php

namespace App\Livewire;

use App\Enums\PaymentOrderStatus;
use App\Models\Ticket;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as InfoListSection;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\Action as TableAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TicketsList extends Component implements HasForms, HasTable, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;
    use InteractsWithTable;

    public static function canCreate(): bool
    {
        return false;
    }

    public function table(Table $table): Table
    {
        $query = Ticket::query()
            ->where('user_id', Auth::user()->id);

        return $table
            ->query($query)
            ->columns([
                Tables\Columns\TextColumn::make('event.title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('ticket_code')
                    ->numeric()
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('payment_order.control_no')
                    ->label('Control No.')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable(),

                TextColumn::make('payment_order.status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(PaymentOrderStatus $state): string => match ($state) {
                        PaymentOrderStatus::Paid => 'success',
                        PaymentOrderStatus::Pending => 'warning',
                        default => 'danger',
                    })
                    ->toggleable(isToggledHiddenByDefault: true),

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
                    ->url(function (Ticket $record) {
                        return $record->payment_order?->invoice_url;
                    })
                    ->visible(function (Ticket $record) {
                        return $record->payment_order?->invoice_url !== null;
                    })
                    ->icon('heroicon-o-document-arrow-down')
                    ->openUrlInNewTab(),
                TableAction::make('receipt')
                    ->url(function (Ticket $record) {
                        return $record->payment_order?->receipt_url;
                    })
                    ->visible(function (Ticket $record) {
                        return $record->payment_order?->receipt_url !== null;
                    })
                    ->icon('heroicon-o-document-arrow-down')
                    ->openUrlInNewTab(),
                ViewAction::make()
                    ->modal()
                    ->infolist(self::infolistSchema())
                    ->size(ActionSize::Small),
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
                    TextEntry::make('event.linkTitle'),
                    TextEntry::make('user.name'),
                    TextEntry::make('created_at')->dateTime(),
                    TextEntry::make('ticket_code'),
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

    public function render()
    {
        return view('livewire.tickets-list');
    }
}
