<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 *
 * @property int $id
 * @property array $attendees
 * @property int $event_id
 * @property float $total_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property int $attendee_count
 * @property-read \App\Models\EventModel $event
 * @property-read \App\Models\PaymentOrder|null $payment_order
 * @property-read mixed $type
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereAttendeeCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereAttendees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereUserId($value)
 * @mixin \Eloquent
 */
class EventBooking extends Model
{
    use HasFactory;

    protected $casts = [
        'attendees' => 'array',
    ];

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

    public function payment_order(): HasOne
    {
        return $this->hasOne(PaymentOrder::class, 'booking_id')->latestOfMany('created_at');
    }

    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->attendee_count > 1 ? 'Group' : 'Single',
        );
    }

    public function getAttendees(): array
    {
        if (is_array($this->attendees)) {
            return $this->attendees;
        }

        return json_decode($this->attendees, true);
    }
}
