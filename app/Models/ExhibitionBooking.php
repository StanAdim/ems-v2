<?php

namespace App\Models;

use App\Casts\AttendeeModels;
use App\Contracts\Billable;
use App\Models\JSON\Booth;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 *
 * @property int $id
 * @property int $event_model_id
 * @property string $order_number
 * @property string $booth_name
 * @property string $booth_size
 * @property float $total
 * @property int|null $payment_order_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Collection|\App\Models\JSON\Attendee[]|null $attendees
 * @property-read \App\Models\User $bookedBy
 * @property-read \App\Models\EventModel $event
 * @property-read \App\Models\PaymentOrder|null $payment_order
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereAttendees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereBoothName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereBoothSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereEventModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking wherePaymentOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitionBooking whereUserId($value)
 * @mixin \Eloquent
 */
class ExhibitionBooking extends Model implements Billable
{
    use HasFactory;

    protected $fillable = [
        'event_model_id',
        'order_number',
        'booth_name',
        'booth_size',
        'total',
        'payment_order_id',
        'user_id',
        'attendees',
    ];

    protected $casts = [
        'total' => 'float',
        'attendees' => AttendeeModels::class,
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(EventModel::class, 'event_model_id');
    }

    public function payment_order(): BelongsTo
    {
        return $this->belongsTo(PaymentOrder::class, 'payment_order_id');
    }

    public static function makeFor(EventModel $event, $attributes): self
    {
        $booking = self::create([
            'event_model_id' => $event->id,
            'order_number' => mt_rand(1000, 99999),
            'user_id' => auth()->user()->id,
        ] + $attributes);

        if ($booking) {
            $event->exhibition_booths->each(function (Booth $item) use ($booking) {
                if ($item->name == $booking->booth_name)
                    $item->booking_id = $booking->id;
            });
            $event->save();
        }

        return $booking;
    }

    public function bookedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function descriptionLines(): array
    {
        return [
            ['Exhibition Order', $this->order_number],
            ['Booth Name', $this->booth_name],
            ['Booth Size', $this->booth_size],
        ];
    }

    public function description(): string
    {
        return "Exhibition booking for {$this->event->title}.\nOrder No: {$this->order_number}";
    }

    public function amount(): float
    {
        return $this->total;
    }

    public function customerDetails(): \Illuminate\Support\Collection
    {
        return collect([
            [
                'name' => $this->bookedBy->name,
                'email' => $this->bookedBy->email,
            ]
        ]);
    }

    public function updateWithPaymentOrder(PaymentOrder $paymentOrder): void
    {
        $this->payment_order_id = $paymentOrder->id;
        $this->save();
    }

    public function attendeesCount(): Attribute
    {
        return Attribute::make(
            fn() => $this->attendees->count(),
        );
    }
}
