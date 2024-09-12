<?php

namespace App\Models;

use App\Contracts\Billable;
use App\Enums\PaymentOrderStatus;
use App\Observers\PaymentOrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $description
 * @property string|null $control_no
 * @property float $total_amount
 * @property string|null $phone_number
 * @property PaymentOrderStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $expires_on
 * @property string|null $invoice_url
 * @property \Illuminate\Support\Collection|null $customer_details
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereControlNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereCustomerDetails($value)
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
        'customer_details' => AsCollection::class,
        'total_amount' => 'float',
    ];

    protected $fillable = [
        'description',
        'control_no',
        'total_amount',
        'expires_on',
        'customer_details',
    ];

    public static function make(Billable $billable, string $phoneNumber): self
    {
        $payment_order = PaymentOrder::create([
            'description' => $billable->description(),
            'total_amount' => $billable->amount(),
            'phone_number' => $phoneNumber,
            'customer_details' => $billable->customerDetails(),
        ]);

        $billable->updateWithPaymentOrder($payment_order);
        return $payment_order;
    }

    public function isPaid(): bool
    {
        return $this->status === PaymentOrderStatus::Paid;
    }

}
