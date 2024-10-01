<?php

namespace App\Models;

use App\Contracts\Billable;
use App\Observers\EventBookingObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

/**
 *
 *
 * @property int $id
 * @property Collection $attendees
 * @property int $event_id
 * @property float $total_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property int $attendee_count
 * @property int|null $payment_order_id
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
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking wherePaymentOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventBooking whereUserId($value)
 * @mixin \Eloquent
 */
#[ObservedBy(EventBookingObserver::class)]
class EventBooking extends Model implements Billable
{
    use HasFactory;

    protected $casts = [
        'attendees' => AsCollection::class,
        'total_amount' => 'float',
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
        'attendee_count',
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

    public function payment_order(): BelongsTo
    {
        return $this->belongsTo(PaymentOrder::class);
    }

    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->attendee_count > 1 ? 'Group' : 'Single',
        );
    }

    public function descriptionLines(): array
    {
        return [
            ['Ticket Number', '81845532'],
            ['Event', $this->event->title],
            ['Ticket Type', $this->type],
        ];
    }
    public function description(): string
    {
        return "{$this->event->title} ({$this->type})";
    }
    public function amount(): float
    {
        return $this->total_amount;
    }
    public function customerDetails(): Collection
    {
        return $this->attendees;
    }
    public function updateWithPaymentOrder(PaymentOrder $paymentOrder): void
    {
        $this->payment_order_id = $paymentOrder->id;
        $this->save();
    }

    public function isPaid(): bool
    {
        return $this->payment_order->isPaid();
    }
}
