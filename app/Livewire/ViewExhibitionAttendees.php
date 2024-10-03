<?php

namespace App\Livewire;

use App\Models\ExhibitionBooking;
use App\Models\JSON\ExhibitionAttendee;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * Summary of ViewAttendees
 *
 * @property ExhibitionBooking $booking
 */
class ViewExhibitionAttendees extends Component implements HasForms, HasInfolists
{
    use InteractsWithInfolists, InteractsWithForms;

    public int $bookingId;

    #[Computed]
    public function booking(): ExhibitionBooking
    {
        return ExhibitionBooking::findOrFail($this->bookingId);
    }

    public function attendeesInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->booking)
            ->schema([
                RepeatableEntry::make('attendees')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('phone'),
                        TextEntry::make('email'),
                        TextEntry::make('booking_price'),
                    ])
            ]);
    }

    public function render()
    {
        return view('livewire.view-exhibition-attendees');
    }
}
