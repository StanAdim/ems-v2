<?php

namespace App\Models;

use App\Enums\PaymentOrderStatus;
use App\Observers\PaymentOrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $booking_id
 * @property string $description
 * @property string|null $control_no
 * @property float $total_amount
 * @property string|null $phone_number
 * @property PaymentOrderStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $expires_on
 * @property string|null $invoice_url
 * @property-read \App\Models\EventBooking $booking
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereControlNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereExpiresOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereInvoiceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
#[ObservedBy([PaymentOrderObserver::class])]
class PaymentOrder extends Model
{
    use HasFactory;


    protected $casts = [
        'expires_on' => 'datetime',
        'status' => PaymentOrderStatus::class,
    ];

    protected $fillable = [
        'booking_id',
        'description',
        'control_no',
        'total_amount',
        'expires_on',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(EventBooking::class);
    }

}
