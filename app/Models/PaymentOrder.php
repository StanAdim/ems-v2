<?php

namespace App\Models;

use App\Contracts\Billable;
use App\Enums\PaymentOrderStatus;
use App\Observers\PaymentOrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice;

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
 * @property \Illuminate\Support\Collection|null $customer_details
 * @property int|null $user_id
 * @property array|null $middleware_bill_data
 * @property string|null $uuid
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
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOrder wherePhoneNumber($value)
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
    ];

    public static function make(Billable $billable, string $phoneNumber, int $userId): self
    {
        $payment_order = PaymentOrder::create([
            'description' => $billable->description(),
            'total_amount' => $billable->amount(),
            'phone_number' => "+255$phoneNumber",
            'customer_details' => $billable->customerDetails(),
            'user_id' => $userId,
            'uuid' => Str::uuid(),
        ]);

        $billable->updateWithPaymentOrder($payment_order);
        return $payment_order;
    }

    public function generateInvoiceDocument()
    {
        $seller = new Party(config('app.business'));

        $firstCustomer = $this->customer_details->first();
        $customer = new Buyer([
            'name' => $firstCustomer['name'],
            'custom_fields' => [
                'email' => $firstCustomer['email'],
                'control_no' => $this->control_no,
                'phone_number' => $this->phone_number,
            ],
        ]);

        $item = InvoiceItem::make($this->description)->pricePerUnit($this->total_amount);
        $invoice = Invoice::make($this->description)
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

        $this->invoice_url = $invoice->url();
        $this->save();
    }

    public function isPaid(): bool
    {
        return $this->status === PaymentOrderStatus::Paid;
    }

}
