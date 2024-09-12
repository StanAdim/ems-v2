<?php

namespace App\Livewire;

use App\Models\ExhibitionBooking;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Livewire\Component;

class ListBookedExhibitions extends Component implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(ExhibitionBooking::query()->whereUserId(auth()->user()->id))
            ->columns([
                TextColumn::make('index')
                    ->label('S/N')
                    ->rowIndex(),
                TextColumn::make('event.linkTitle')
                    ->searchable(),
                TextColumn::make('order_number')
                    ->label('Exhibition Order')
                    ->searchable(),
                TextColumn::make('booth_name')
                    ->label('Booth Number')
                    ->searchable(),
                TextColumn::make('booth_size')
                    ->label('Booth Size')
                    ->searchable(),
                TextColumn::make('payment_order.status')
                    ->label('Status'),
                TextColumn::make('attendees_count')
                    ->icon('heroicon-o-users')
                    ->default('No Attendees')
                    ->action(
                        Action::make('exhibitionAttendees')
                            ->label('View Exhibition Attendees')
                            ->action(fn(ExhibitionBooking $booking) => $booking)
                            ->modalHeading('Exhibition Attendees')
                            ->modalContent(view('filament.modals.view-exhibition-attendees'))
                            ->modalSubmitAction(false)
                            ->modalCancelAction(false),
                    ),
            ])
            ->actions([
                Action::make('addAttendees')
                    ->action(fn(ExhibitionBooking $booking) => $booking)
                    ->modalContent(view('filament.modals.add-attendees'))
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false),
            ]);
    }

    public function render()
    {
        return view('livewire.list-booked-exhibitions');
    }
}
