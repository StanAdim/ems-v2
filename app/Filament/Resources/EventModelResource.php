<?php

namespace App\Filament\Resources;

use App\Enums\EventState;
use App\Filament\Resources\EventModelResource\Pages;
use App\Filament\Resources\EventModelResource\RelationManagers\BookingsRelationManager;
use App\Filament\Resources\EventModelResource\RelationManagers\ExhibitionBookingsRelationManager;
use App\Filament\Resources\EventModelResource\RelationManagers\ReviewsRelationManager;
use App\Filament\Resources\EventModelResource\RelationManagers\TicketsRelationManager;
use App\Models\EventModel;
use App\Models\EventSpeaker;
use ArberMustafa\FilamentLocationPickrField\Forms\Components\LocationPickr;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use TomatoPHP\FilamentIcons\Components\IconPicker;

class EventModelResource extends Resource
{
    protected static ?string $model = EventModel::class;
    protected static ?string $modelLabel = 'Event';
    protected static ?string $recordTitleAttribute = 'linkTitle';

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Event Details')->schema([
                            TextInput::make('title')->required(),
                            TextInput::make('linkTitle')->label('Short Title')->hint('For Displaying in Links')->required(),
                            TextInput::make('edition'),
                            Split::make([
                                DatePicker::make('startsOn')->required(),
                                DatePicker::make('endsOn')->required(),
                                Select::make('state')->options(EventState::class)->native(false)->required(),
                            ]),
                            SpatieMediaLibraryFileUpload::make('event_logo')->collection(EventModel::MEDIA_COLLECTION_EVENT_LOGO),
                            SpatieMediaLibraryFileUpload::make('call_for_speakers_document')->collection(EventModel::MEDIA_COLLECTION_CALL_FOR_SPEAKERS_DOCUMENT),
                            Repeater::make('fees')->schema([
                                Select::make('package_type')
                                    ->options(EventModel::getFeesTypesList())
                                    ->native(false)
                                    ->columnSpan(6)
                                    ->distinct()
                                    ->required(),
                                TextInput::make('amount')
                                    ->label('Fee Amount')
                                    ->required()
                                    ->numeric()
                                    ->mask(RawJs::make('$money($input)'))
                                    ->stripCharacters(',')
                                    ->columnSpan(6)
                                    ->required(),
                            ])
                                ->label('Fee Packages')
                                ->columns(12)
                                ->minItems(3)
                                ->maxItems(3),
                        ]),
                        Tab::make('About')->schema([
                            Textarea::make('aboutTitle')->label('Heading')->required(),
                            TiptapEditor::make('aboutDescription')->label('Description')->required(),
                            SpatieMediaLibraryFileUpload::make('about_banner')->collection(EventModel::MEDIA_COLLECTION_ABOUT_BANNER),
                        ]),
                        Tab::make('Help')->schema([
                            Textarea::make('helpTitle')->label('Heading'),
                            TiptapEditor::make('helpDescription')->label('Description'),
                        ]),
                        Tab::make('Themes')->schema([
                            Textarea::make('theme')->label('Main')->required(),
                            Repeater::make('subThemes')->schema([
                                IconPicker::make('icon')->columnSpan(2),
                                Textarea::make('message')->columnSpan(4),
                            ])->label('Sub Themes')->columns(6),
                            SpatieMediaLibraryFileUpload::make('theme_banner')->collection(EventModel::MEDIA_COLLECTION_THEME_BANNER),
                        ]),
                        Tab::make('Location')->schema([
                            TextInput::make('locationDescription')->label('Description')->required(),
                            LocationPickr::make('location')->label('Map'),
                        ]),
                        Tab::make('Speakers List')->schema([
                            Repeater::make('speakers')
                                ->relationship()
                                ->columns(3)
                                ->schema([
                                    TextInput::make('name')->required()->columnSpan(1),
                                    TextInput::make('company')->required()->columnSpan(1),
                                    TextInput::make('position')->required()->columnSpan(1),
                                    SpatieMediaLibraryFileUpload::make('photo')
                                        ->collection(EventSpeaker::MEDIA_COLLECTION_SPEAKER_PHOTOS)
                                        ->required()
                                        ->downloadable()
                                        ->image()
                                        ->imageEditor()
                                        ->imageResizeMode('cover')
                                        ->imageCropAspectRatio('16:9')
                                        ->columnSpan(3),
                                    TextInput::make('topic')->columnSpan(2),
                                    Toggle::make('is_key_speaker'),
                                ])
                        ]),
                        Tab::make('Banners Configuration')->schema([
                            SpatieMediaLibraryFileUpload::make('main_banner')->collection(EventModel::MEDIA_COLLECTION_MAIN_BANNER),
                            SpatieMediaLibraryFileUpload::make('participate_banner')->collection(EventModel::MEDIA_COLLECTION_PARTICIPATE_BANNER),
                        ]),
                        Tab::make('Exhibition Configuration')->schema([
                            SpatieMediaLibraryFileUpload::make('exhibition_layout_plan')->collection(EventModel::MEDIA_COLLECTION_EXHIBITION_LAYOUT_PLAN),
                            Repeater::make('exhibition_booths')
                                ->schema([
                                    TextInput::make('name')
                                        ->label('Booth Name')
                                        ->columnSpan(3)
                                        ->required()
                                        ->distinct(),
                                    TextInput::make('size')
                                        ->label('Booth Size')
                                        ->columnSpan(3)
                                        ->required(),
                                    TextInput::make('price')
                                        ->label('Booth Price')
                                        ->numeric()
                                        ->mask(RawJs::make('$money($input)'))
                                        ->stripCharacters(',')
                                        ->columnSpan(3)
                                        ->required(),
                                    TextInput::make('attendee_price')
                                        ->label('Booth Attendee Price')
                                        ->numeric()
                                        ->mask(RawJs::make('$money($input)'))
                                        ->stripCharacters(',')
                                        ->columnSpan(3)
                                        ->default(450_000)
                                        ->required(),
                                    Hidden::make('booking_id')
                                ])
                                ->cloneable()
                                ->label('Available Booths')
                                ->columns(12),
                        ]),
                        Tab::make('Extra Configuration')->schema([
                            Select::make('configuration.upcomingCardLayout')
                                ->columnSpan(1)
                                ->options(fn($record) => $record->configuration::getUpComingCardLayoutOptions()),
                            Select::make('configuration.previousEditionsIds')
                                ->columnSpan(1)
                                ->label('Previous Editions')
                                ->options(function (EventModel $record) {
                                    return $record::whereNotIn('id', [$record->id])
                                        ->get()
                                        ->pluck('title', 'id');
                                })
                                ->multiple()
                                ->searchable(),
                        ]),
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable(true)->searchable(),
                TextColumn::make('startsOn')->sortable()->dateTime(),
                TextColumn::make('endsOn')->sortable()->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            BookingsRelationManager::class,
            ExhibitionBookingsRelationManager::class,
            ReviewsRelationManager::class,
            TicketsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventModels::route('/'),
            'create' => Pages\CreateEventModel::route('/create'),
            'view' => Pages\ViewEventModel::route('/{record}'),
            'edit' => Pages\EditEventModel::route('/{record}/edit'),
        ];
    }
}
