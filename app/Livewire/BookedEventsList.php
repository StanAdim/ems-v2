<?php

namespace App\Livewire;

use App\Enums\BookingType;
use App\Enums\PaymentOrderStatus;
use App\Filament\Resources\EventBookingResource;
use App\Models\EventBooking;
use App\Models\EventModel;
use Filament\Actions\Action;
use Filament\Actions\CreateAction as ActionsCreateAction;
use Filament\Actions\DeleteAction;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction as ActionsDeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Get;

class BookedEventsList extends Component implements HasForms, HasTable, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;
    use InteractsWithTable;

    protected static string $resource = EventBookingResource::class;
    public ?BookingType $bookingType = null;

    public static function canCreate(): bool
    {
        return false;
    }

    public function table(Table $table): Table
    {
        $query = EventBooking::query()->where('user_id', Auth::user()->id);
        switch ($this->bookingType) {
            case BookingType::Single:
                $query->where('attendee_count', '==', 1);
                break;

            case BookingType::Group:
                $query->where('attendee_count', '>', 1);
                break;
        }

        return $table
            ->query($query)
            ->columns([
                Tables\Columns\TextColumn::make('event.title')
                    ->searchable()
                    ->sortable(),
                ViewColumn::make('attendees')->view('tables.columns.attendees-column'),

                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('type'),
                TextColumn::make('payment_order.status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (PaymentOrderStatus $state): string => match ($state) {
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
                // Tables\Columns\TextColumn::make('payment_id')
                //     ->numeric()
                //     ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                ViewAction::make()->modal()->form($this->formSchema()),

                // ActionsDeleteAction::make()
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ])->headerActions([
                    CreateAction::make()
                        ->model(EventBooking::class)
                        ->label('Create Bookings')
                        ->form([
                            Hidden::make('user_id')
                                ->default(Auth::id()),
                            Select::make('event_id')
                                ->relationship('event', 'title')
                                ->required()
                                ->live(),
                            TextInput::make('total_amount')
                                ->required(),

                            Repeater::make('attendees')
                                ->label('Attendees Details')
                                ->schema([
                                    TextInput::make('name')
                                        ->label('Name')
                                        ->required(),

                                    TextInput::make('phone_number')
                                        ->label('Phone Number')
                                        ->required(),

                                    TextInput::make('email')
                                        ->label('Email')
                                        ->email()
                                        ->required(),
                                ])
                                ->createItemButtonLabel('Add Attendee')
                                ->columns(3)
                                ->defaultItems(1)
                                ->collapsible(true), // Starts with one attendee row by default

                            Section::make('Extra Attendees Details')
                                ->schema([
                                    TextInput::make('organization')
                                        ->label('Organization/Company')
                                        ->placeholder('Organization/Company'),

                                    Select::make('nationality')
                                        ->label('Nationality')
                                        ->options([
                                            'tanzania' => 'Tanzania',
                                            'kenya' => 'Kenya',
                                            // add more countries here
                                        ])
                                        ->placeholder('Choose a country'),

                                    Select::make('registration_status')
                                        ->label('Registration Status')
                                        ->options(function (Get $get) {
                                            $eventId = $get('event_id');
                                            if (!$eventId)
                                                return [];

                                            $event = EventModel::whereId($eventId)->first();
                                            $availableFees = [];
                                            foreach ($event->getAvailableFeesList() as $type => $fee) {
                                                $availableFees[$type] = $fee['title'];
                                            }
                                            return $availableFees;
                                        })->default(['registered'])
                                        ->placeholder('Select Status'),

                                    TextInput::make('registration_number')
                                        ->label('Registration Number')
                                        ->placeholder('1274793-123'),
                                ])->columns(2),

                            Checkbox::make('agree_to_terms')
                                ->label('Agree to term & conditions')
                                ->required(),
                            // ...
                        ]),
                ]);
    }

    public static function formSchema(): array
    {
        return
            [
                Hidden::make('user_id')
                    ->default(Auth::id()),
                Select::make('event_id')
                    ->relationship('event', 'title')
                    ->required(),
                TextInput::make('total_amount')
                    ->required(),

                Repeater::make('attendees')
                    ->label('Attendees Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),

                        TextInput::make('phone_number')
                            ->label('Phone Number')
                            ->required(),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),
                    ])
                    ->createItemButtonLabel('Add Attendee')
                    ->columns(3)
                    ->defaultItems(1)
                    ->collapsible(true), // Starts with one attendee row by default

                Section::make('Extra Attendees Details')
                    ->schema([
                        TextInput::make('organization')
                            ->label('Organization/Company')
                            ->placeholder('Organization/Company'),

                        Select::make('nationality')
                            ->label('Nationality')
                            ->options([
                                'tanzania' => 'Tanzania',
                                'kenya' => 'Kenya',
                                // add more countries here
                            ])
                            ->placeholder('Choose a country'),

                        Select::make('registration_status')
                            ->label('Registration Status')
                            ->options([
                                'not registered' => 'Not Registered',
                                'foreigner' => 'Foreigner',
                                // add more statuses here
                            ])->default(['registered'])
                            ->placeholder('Select Status'),

                        TextInput::make('registration_number')
                            ->label('Registration Number')
                            ->placeholder('1274793-123'),
                    ])->columns(2),

                Checkbox::make('agree_to_terms')
                    ->label('Agree to term & conditions')
                    ->required(),
                // ...
            ];
    }

    protected function viewForm(EventBooking $record): Form
    {
        return $this->form($record);
    }


    // public static function getInfolist() : array {
    //     return [];
    // }

    public static function infolist(Infolist $infoList): Infolist
    {
        return $infoList
            ->schema([
                RepeatableEntry::make('attendees')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('phone'),
                        TextEntry::make('email'),
                    ])->columns(3),
                TextEntry::make('total_amount')->money('TSHS'),
                TextEntry::make('created_at')->dateTime(),
            ])->columns(1);
    }

    public function render(): View
    {
        return view('livewire.booked-events-list');
    }
}
