<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventModelResource\Pages;
use App\Filament\Resources\EventModelResource\RelationManagers;
use App\Models\EventModel;
use ArberMustafa\FilamentLocationPickrField\Forms\Components\LocationPickr;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use TomatoPHP\FilamentIcons\Components\IconPicker;

class EventModelResource extends Resource
{
    protected static ?string $model = EventModel::class;
    protected static ?string $modelLabel = 'Event';

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
                            Split::make([
                                DateTimePicker::make('startsOn')->minutesStep(15)->seconds(false)->required(),
                                DateTimePicker::make('endsOn')->minutesStep(15)->seconds(false)->required(),
                            ]),
                            SpatieMediaLibraryFileUpload::make('event_logo')->collection(EventModel::MEDIA_COLLECTION_EVENT_LOGO),
                        ]),
                        Tab::make('About')->schema([
                            Textarea::make('aboutTitle')->label('Heading')->required(),
                        TiptapEditor::make('aboutDescription')->label('Description')->required(),
                            SpatieMediaLibraryFileUpload::make('about_banner')->collection(EventModel::MEDIA_COLLECTION_ABOUT_BANNER),
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
                        Tab::make('Banners Configuration')->schema([
                            SpatieMediaLibraryFileUpload::make('main_banner')->collection(EventModel::MEDIA_COLLECTION_MAIN_BANNER),
                            SpatieMediaLibraryFileUpload::make('participate_banner')->collection(EventModel::MEDIA_COLLECTION_PARTICIPATE_BANNER),
                        ])
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListEventModels::route('/'),
            'create' => Pages\CreateEventModel::route('/create'),
            'view' => Pages\ViewEventModel::route('/{record}'),
            'edit' => Pages\EditEventModel::route('/{record}/edit'),
        ];
    }
}
