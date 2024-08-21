<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $linkTitle
 * @property string $theme
 * @property string $subThemes
 * @property string|null $bannerText
 * @property string $startsOn
 * @property string $endsOn
 * @property string|null $location
 * @property string|null $locationDescription
 * @property string|null $aboutTitle
 * @property string $aboutDescription
 * @property string|null $whyParticipate
 * @property string $layout
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\EventModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereAboutDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereAboutTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereBannerText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereEndsOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereLinkTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereLocationDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereStartsOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereSubThemes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereWhyParticipate($value)
 * @mixin \Eloquent
 */
class EventModel extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    // const MEDIA_COLLECTION_IMAGE_TYPES = ['I']
    const MEDIA_COLLECTION_EVENT_LOGO = 'event-main-logo';
    const MEDIA_COLLECTION_MAIN_BANNER = 'event-main-banner';
    const MEDIA_COLLECTION_THEME_BANNER = 'event-theme-banner';
    const MEDIA_COLLECTION_PARTICIPATE_BANNER = 'event-participate-banner';
    const MEDIA_COLLECTION_ABOUT_BANNER = 'event-about-banner';


    protected $fillable = [
        'title',
        'linkTitle',
        'bannerText',
        'startsOn',
        'endsOn',
        'location',
        'locationDescription',
        'aboutTitle',
        'aboutDescription',
    ];

    public function setLocationAttribute($location)
    {
        $this->location = json_encode($location);
    }

    public function registerMediaconversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->queued();
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection(self::MEDIA_COLLECTION_EVENT_LOGO)
            ->singleFile()
            ->acceptsMimeTypes(['image/png', 'image/svg']);

        $this
            ->addMediaCollection(self::MEDIA_COLLECTION_MAIN_BANNER)
            ->singleFile()
            ->acceptsMimeTypes(['','']);
    }
}
