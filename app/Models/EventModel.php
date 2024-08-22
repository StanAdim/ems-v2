<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\MediaCollection;
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
 * @property MediaCollection $event_logo
 * @property-read mixed $about_banner
 * @property-read mixed $main_banner
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read mixed $participate_banner
 * @property-read mixed $theme_banner
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

    const MEDIA_COLLECTION_IMAGE_TYPES = ['image/png', 'image/svg'];
    const MEDIA_COLLECTION_EVENT_LOGO = 'event-logo';
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
        'theme',
        'subThemes',
        'locationDescription',
        'aboutTitle',
        'aboutDescription',
        'whyParticipate',
        'layout',
    ];

    protected $casts = [
        // 'event_logo' => MediaCollection::class,
        'subThemes' => 'json',
    ];

    protected $attributes = [
        'layout' => 'layout-complex',
    ];

    public function setLocationAttribute($location)
    {
        $this->location = json_encode($location);
    }

    public function mainBanner(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->getMedia(self::MEDIA_COLLECTION_MAIN_BANNER)
        );
    }

    public function eventLogo(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_EVENT_LOGO)
        );
    }

    public function themeBanner(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_THEME_BANNER)
        );
    }

    public function participateBanner(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_PARTICIPATE_BANNER)
        );
    }

    public function aboutBanner(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_ABOUT_BANNER)
        );
    }

    /* public function registerMediaconversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->queued();
    } */

    public function registerMediaCollections(): void
    {
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_EVENT_LOGO);
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_MAIN_BANNER);
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_THEME_BANNER);
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_ABOUT_BANNER);
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_PARTICIPATE_BANNER);
    }

    private function registerSingleFileImageCollection(string $collectionName): void
    {
        $this
            ->addMediaCollection($collectionName)
            ->singleFile()
            ->acceptsMimeTypes(self::MEDIA_COLLECTION_IMAGE_TYPES);
    }
}
