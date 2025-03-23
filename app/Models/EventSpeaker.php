<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * 
 *
 * @property int $id
 * @property int $event_model_id
 * @property string $name
 * @property string $position
 * @property string $company
 * @property string|null $topic
 * @property bool $is_key_speaker
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\EventModel|null $event
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker whereEventModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker whereIsKeySpeaker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker whereTopic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSpeaker whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventSpeaker extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public const MEDIA_COLLECTION_SPEAKER_PHOTOS = 'speaker-photos';

    protected $casts = [
        'is_key_speaker' => 'boolean',
    ];
    protected $fillable = [
        'name',
        'position',
        'company',
        'topic',
        'is_key_speaker',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(EventModel::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION_SPEAKER_PHOTOS)
            ->singleFile()
            ->acceptsMimeTypes(['image/png', 'image/svg']);
    }

    public function getPhotoUrl(): ?string
    {
        $media = $this->getMedia(self::MEDIA_COLLECTION_SPEAKER_PHOTOS)->first();
        return $media?->getUrl();
    }
}
