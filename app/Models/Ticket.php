<?php

namespace App\Models;

use App\Events\TicketCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Str;

/**
 *
 *
 * @property int $id
 * @property int $event_model_id
 * @property int $user_id
 * @property int $payment_order_id
 * @property string $ticket_code
 * @property bool $is_used
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\EventModel $event
 * @property-read \App\Models\PaymentOrder $payment_order
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereEventModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereIsUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePaymentOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTicketCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @mixin \Eloquent
 */
class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_model_id',
        'user_id',
        'payment_order_id',
        'ticket_code',
        'is_used',
    ];

    protected $casts = [
        'is_used' => 'boolean',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(EventModel::class, 'event_model_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment_order(): BelongsTo
    {
        return $this->belongsTo(PaymentOrder::class, 'payment_order_id');
    }

    public static function generateTicketNo($prefix, $length = 10)
    {
        do {
            // Generate a random uppercase alphanumeric string
            $code = $prefix . strtoupper(Str::random($length));

            // Ensure uniqueness in the database
        } while (self::where('ticket_code', $code)->exists());

        return $code;
    }

    /**
     * Summary of make
     * @param string $code
     * @param EventModel $event
     * @param User $owner
     * @param PaymentOrder $paymentOrder
     * @return self
     */
    public static function make($code, $event, $owner, $paymentOrder)
    {
        $ticket = self::create([
            'event_model_id' => $event->id,
            'user_id' => $owner->id,
            'payment_order_id' => $paymentOrder->id,
            'ticket_code' => $code,
        ]);

        TicketCreated::dispatch($ticket);

        return $ticket;
    }
}
