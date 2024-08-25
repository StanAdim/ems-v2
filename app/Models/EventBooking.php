<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property string $attendees
 * @property int $event_id
 * @property float $total_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $payment_id
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereAttendees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventBooking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'attendees',
        'user_id',
        'event_id',
        'total_amount',
        'payment_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the user that owns the EventBooking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(EventModel::class);
    }
}
