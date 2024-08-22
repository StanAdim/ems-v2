<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $booking_id
 * @property string $description
 * @property string $control_no
 * @property float $total_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereControlNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PaymentOrder extends Model
{
    use HasFactory;
}
