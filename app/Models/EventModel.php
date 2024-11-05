<?php

namespace App\Models;

use App\Casts\BoothConfigurationCast;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $linkTitle
 * @property string $theme
 * @property array $subThemes
 * @property string|null $bannerText
 * @property \Illuminate\Support\Carbon $startsOn
 * @property \Illuminate\Support\Carbon $endsOn
 * @property string|null $location
 * @property string|null $locationDescription
 * @property string|null $aboutTitle
 * @property string $aboutDescription
 * @property string|null $whyParticipate
 * @property string $layout
 * @property array $fees
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Collection|\App\Models\JSON\Booth[]|null $exhibition_booths
 * @property-read mixed $about_banner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventBooking> $bookings
 * @property-read int|null $bookings_count
 * @property-read mixed $booths_available
 * @property-read mixed $call_for_speakers_document
 * @property-read mixed $event_logo
 * @property-read mixed $exhibition_layout_plan
 * @property-read mixed $main_banner
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read mixed $participate_banner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventConversation> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read mixed $theme_banner
 * @method static \Database\Factories\EventModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereAboutDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereAboutTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereBannerText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereEndsOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereExhibitionBooths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereFees($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
class EventModel extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasRoles, HasPanelShield;

    const MEDIA_COLLECTION_IMAGE_TYPES = ['image/png', 'image/svg'];
    const MEDIA_COLLECTION_EVENT_LOGO = 'event-logo';
    const MEDIA_COLLECTION_MAIN_BANNER = 'event-main-banner';
    const MEDIA_COLLECTION_THEME_BANNER = 'event-theme-banner';
    const MEDIA_COLLECTION_PARTICIPATE_BANNER = 'event-participate-banner';
    const MEDIA_COLLECTION_ABOUT_BANNER = 'event-about-banner';
    const MEDIA_COLLECTION_EXHIBITION_LAYOUT_PLAN = 'exhibition-layout-plan';
    const MEDIA_COLLECTION_CALL_FOR_SPEAKERS_DOCUMENT = 'call-for-speakers-document';

    const FEE_REGISTERED = 'registered';
    const FEE_NON_REGISTERED = 'non_registered';
    const FEE_FOREIGNER = 'foreigner';


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
        'fees',
        'exhibition_booths',
    ];

    protected $casts = [
        // 'event_logo' => MediaCollection::class,
        'subThemes' => 'json',
        'startsOn' => 'datetime',
        'endsOn' => 'datetime',
        'fees' => 'json',
        'exhibition_booths' => BoothConfigurationCast::class,
    ];

    protected $attributes = [
        'layout' => 'layout-complex',
    ];

    public function setLocationAttribute($location)
    {
        $this->location = json_encode($location);
    }

    public function getMediaUrl($collectionMedia): ?string
    {
        $media = $collectionMedia[0] ?? null;
        return $media?->getUrl();
    }

    public function mainBanner(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->getMedia(self::MEDIA_COLLECTION_MAIN_BANNER)
        );
    }

    function getMainBannerUrl(): ?string
    {
        return $this->getMediaUrl($this->main_banner);
    }

    public function eventLogo(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_EVENT_LOGO)
        );
    }

    function getEventLogoUrl(): ?string
    {
        return $this->getMediaUrl($this->event_logo);
    }

    public function themeBanner(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_THEME_BANNER)
        );
    }

    function getThemeBannerUrl(): ?string
    {
        return $this->getMediaUrl($this->theme_banner);
    }

    public function participateBanner(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_PARTICIPATE_BANNER)
        );
    }

    function getParticipateBannerUrl(): ?string
    {
        return $this->getMediaUrl($this->participate_banner);
    }

    public function aboutBanner(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_ABOUT_BANNER)
        );
    }

    function getAboutBannerUrl(): ?string
    {
        return $this->getMediaUrl($this->about_banner);
    }

    public function exhibitionLayoutPlan(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_EXHIBITION_LAYOUT_PLAN)
        );
    }

    function getExhibitionLayoutPlanUrl(): ?string
    {
        return $this->getMediaUrl($this->exhibition_layout_plan);
    }

    public function callForSpeakersDocument(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->getMedia(self::MEDIA_COLLECTION_CALL_FOR_SPEAKERS_DOCUMENT)
        );
    }

    function getCallForSpeakersDocumentUrl(): ?string
    {
        return $this->getMediaUrl($this->call_for_speakers_document);
    }

    public function registerMediaCollections(): void
    {
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_EVENT_LOGO);
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_MAIN_BANNER);
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_THEME_BANNER);
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_ABOUT_BANNER);
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_PARTICIPATE_BANNER);
        $this->registerSingleFileImageCollection(self::MEDIA_COLLECTION_EXHIBITION_LAYOUT_PLAN);
    }

    private function registerSingleFileImageCollection(string $collectionName): void
    {
        $this
            ->addMediaCollection($collectionName)
            ->singleFile()
            ->acceptsMimeTypes(self::MEDIA_COLLECTION_IMAGE_TYPES);
    }

    public function guardName()
    {
        return ['web'];
    }

    /**
     * Get all of the bookings for the EventModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(EventBooking::class, 'event_id');
    }

    public function getAvailableFeesList()
    {
        $fees = [];
        foreach ($this->fees as $fee_array) {
            $package_type = $fee_array['package_type'];
            $amount = $fee_array['amount'] ?? 0;
            $fees[$package_type] = [
                'amount' => $amount,
                'title' => self::getFeesTypesList()[$package_type]
            ];
        }

        return $fees;
    }

    public static function getFeesTypesList()
    {
        return [
            self::FEE_REGISTERED => 'Registered',
            self::FEE_NON_REGISTERED => 'Non Registered',
            self::FEE_FOREIGNER => 'Foreigner',
        ];
    }

    public function questions(): HasMany
    {
        return $this->hasMany(EventConversation::class)->where('parent_conversation_id', '=', null);
    }

    protected function boothsAvailable(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->exhibition_booths->where('booking_id', '==', null)
        );
    }

}
