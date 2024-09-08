<?php

namespace App\Livewire;

use App\Models\ExhibitionBooking;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
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
            ]);
    }

    public function render()
    {
        return view('livewire.list-booked-exhibitions');
    }
}
