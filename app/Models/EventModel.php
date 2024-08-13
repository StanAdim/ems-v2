<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string|null $bannerText
 * @property string $startsOn
 * @property string $endsOn
 * @property string|null $location
 * @property string|null $locationDescription
 * @property string|null $aboutTitle
 * @property string $aboutDescription
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
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereLocationDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereStartsOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
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
        $this->location  = json_encode($location);
    }
}
