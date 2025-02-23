<?php

namespace App\Models;

use App\Contracts\Billable;
use App\Enums\PaymentOrderStatus;
use App\Observers\PaymentOrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 *
 *
 * @property int $id
 * @property string $description
 * @property string|null $control_no
 * @property float $total_amount
 * @property string|null $paid_amount
 * @property string|null $phone_number
 * @property PaymentOrderStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $paid_at
 * @property \Illuminate\Support\Carbon|null $expires_on
 * @property string|null $invoice_url
 * @property string|null $receipt_url
 * @property \Illuminate\Support\Collection|null $customer_details
 * @property int|null $user_id
 * @property array|null $middleware_bill_data
 * @property string|null $uuid
 * @property string $model_class
 * @property string $model_id
 * @property-read float $amount_to_pay
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Coupon> $coupons
 * @property-read int|null $coupons_count
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
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereMiddlewareBillData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereModelClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereReceiptUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder whereUuid($value)
 * @mixin \Eloquent
 */
#[ObservedBy([PaymentOrderObserver::class])]
class PaymentOrder extends Model
{
    use HasFactory;


    protected $casts = [
        'expires_on' => 'datetime',
        'paid_at' => 'datetime',
        'status' => PaymentOrderStatus::class,
        'customer_details' => AsCollection::class,
        'total_amount' => 'float',
        'middleware_bill_data' => 'json',
    ];

    protected $fillable = [
        'description',
        'control_no',
        'total_amount',
        'expires_on',
        'customer_details',
        'user_id',
        'phone_number',
        'uuid',
        'model_class',
        'model_id',
        'paid_amount',
        'middleware_bill_data',
    ];

    protected $appends = ['amount_to_pay'];

    public static function make(Billable $billable, string $phoneNumber, int $userId, $couponCodes = []): self
    {
        $payment_order = PaymentOrder::create([
            'description' => $billable->description(),
            'total_amount' => $billable->amount(),
            'phone_number' => "+255$phoneNumber",
            'customer_details' => $billable->customerDetails(),
            'user_id' => $userId,
            'uuid' => Str::uuid(),
            'model_class' => $billable->modelClass(),
            'model_id' => $billable->modelId(),
        ]);

        foreach ($couponCodes as $code) {
            $amountCoveredByCoupon = Coupon::apply(
                $code,
                $payment_order->total_amount,
                $payment_order
            );
            $payment_order->paid_amount += $amountCoveredByCoupon;

            if ($payment_order->paid_amount >= $payment_order->total_amount)
                break; // No need to apply any other coupons

        }

        $payment_order->save();
        $billable->updateWithPaymentOrder($payment_order);
        return $payment_order;
    }

    public static function getQRCodeSvg(string $content): ?string
    {

        $from = [13, 163, 222];
        $to = [56, 172, 61];

        $qrCode = QrCode::size(200)
            ->style('dot')
            ->eye('circle')
            ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
            ->margin(1)
            ->generate(
                $content,
            );

        return $qrCode;
    }

    /**
     * Summary of generateDocumentFor
     * @param string $type - one of 'invoice' or 'receipt'
     * @return void
     */
    public function generateDocumentFor($type = 'invoice')
    {
        $seller = new Party(config('app.business'));

        $firstCustomer = $this->customer_details->first();
        $customer = new Buyer([
            'name' => $firstCustomer['name'],
            'custom_fields' => [
                'email' => $firstCustomer['email'],
                'control_no' => $this->control_no,
                'phone_number' => $this->phone_number,
                'qr_code' => $this->control_no ? self::getQRCodeSvg($this->control_no) : '',
            ],
        ]);

        $item = InvoiceItem::make($this->description)->pricePerUnit($this->total_amount);
        $invoice = Invoice::make($this->description . $type)
            ->status($this->isPaid() ? 'paid' : 'not-paid')
            ->setCustomData(['paid_at' => $this->paid_at?->toDateString()])
            ->seller($seller)
            ->buyer($customer)
            ->currencySymbol('TSHS')
            ->currencyCode('TSHS')
            ->currencyFormat('{SYMBOL} {VALUE}')
            ->currencyThousandsSeparator(',')
            ->payUntilDays(7)
            ->addItem($item)
            ->logo(public_path('vendor/invoices/invoice_logo.png'));

        $invoice->save('public');

        switch ($type) {
            case 'invoice':
                $this->invoice_url = $invoice->url();
                break;
            case 'receipt':
                $this->receipt_url = $invoice->url();
                break;
        }

        $this->save();
    }

    public function isPaid(): bool
    {
        return $this->status === PaymentOrderStatus::Paid;
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function amountToPay(): Attribute
    {
        return Attribute::make(fn($value): float => $this->total_amount - $this->paid_amount);
    }

}
