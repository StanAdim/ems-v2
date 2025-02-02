<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

/**
 * 
 *
 * @property int $id
 * @property int|null $event_model_id
 * @property int|null $payment_order_id
 * @property string $code
 * @property string $description
 * @property string $discount_type
 * @property float $discount_value
 * @property float $min_order_amount
 * @property float $max_discount_amount
 * @property int $usage_limit
 * @property int $usage_count
 * @property \Illuminate\Support\Carbon $expires_at
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\EventModel|null $event
 * @property-read \App\Models\PaymentOrder|null $paymentOrder
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscountValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereEventModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereMaxDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereMinOrderAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon wherePaymentOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUsageCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUsageLimit($value)
 * @mixin \Eloquent
 */
class Coupon extends Model
{
    use HasFactory;

    public const DISCOUNT_TYPE_FIXED = 'fixed';
    public const DISCOUNT_TYPE_PERCENTAGE = 'percentage';

    protected $fillable = [
        'code',
        'description',
        'discount_type',
        'discount_value',
        'min_order_amount',
        'max_discount_amount',
        'usage_limit',
        'usage_count',
        'expires_at',
        'is_active',
    ];

    protected $casts = [
        'discount_value' => 'float',
        'min_order_amount' => 'float',
        'max_discount_amount' => 'float',
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public static function getDiscountTypes()
    {
        return [
            self::DISCOUNT_TYPE_FIXED => 'Fixed',
            self::DISCOUNT_TYPE_PERCENTAGE => 'Percentage',
        ];
    }

    public function paymentOrder()
    {
        return $this->belongsTo(PaymentOrder::class);
    }

    public function event()
    {
        return $this->belongsTo(EventModel::class, 'event_model_id');
    }

    /**
     * Check if the coupon is valid.
     */
    public function isValid()
    {
        return $this->is_active && $this->expires_at->gt(now()) && ($this->usage_limit === null || $this->usage_count < $this->usage_limit);
    }

    /**
     * Calculate the discount for a given order amount.
     */
    private function calculateDiscount(float $orderAmount): float
    {
        if ($orderAmount < $this->min_order_amount) {
            return 0;
        }

        if ($this->discount_type === 'fixed') {
            return min($this->discount_value, $orderAmount);
        }

        if ($this->discount_type === 'percentage') {
            $discount = ($orderAmount * $this->discount_value) / 100;
            return min($discount, $this->max_discount_amount ?? $discount);
        }

        return 0;
    }

    /**
     * Computes the discount from the code on amount. And returns the amount the coupon pays for.
     * @param string $code
     * @param float $amount
     * @param PaymentOrder $paymentOrder
     * @return float
     */
    public static function apply($code, $amount, $paymentOrder = null)
    {
        $coupon = Coupon::whereCode($code)->first();
        if ($coupon->isValid()) {
            $discount = $coupon->calculateDiscount($amount);

            if ($paymentOrder) {
                $coupon->update([
                    'payment_order_id' => $paymentOrder?->id,
                    'used_count' => ++$coupon->usage_count,
                ]);
            }

            return $discount;
        }

        return 0;
    }

    /**
     * Generate a unique coupon code.
     *
     * @param int $length Length of the coupon code (default is 10)
     * @param string $prefix Optional prefix (e.g., "SUMMER-")
     * @return string Unique coupon code
     */
    public static function generateCouponCode(int $length = 10, string $prefix = ''): string
    {
        do {
            // Generate a random uppercase alphanumeric string
            $code = $prefix . strtoupper(Str::random($length));

            // Ensure uniqueness in the database
        } while (Coupon::where('code', $code)->exists());

        return $code;
    }
}
