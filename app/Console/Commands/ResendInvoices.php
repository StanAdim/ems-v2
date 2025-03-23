<?php

namespace App\Console\Commands;

use App\Events\ControlNoUpdated;
use App\Models\PaymentOrder;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ResendInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:resend-invoices {--from="this week"} {--to=now}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resend invoices for a given date range';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fromInput = $this->option('from');
        $toInput = $this->option('to');

        try {
            $from = Carbon::parse($fromInput)->startOfDay();
            $to = Carbon::parse($toInput)->endOfDay();

            // Validate the date range
            if ($from->greaterThan($to)) {
                $this->error("The 'from' date cannot be after the 'to' date.");
                return;
            }

            $this->info("Resending invoices from {$from->toDateTimeString()} to {$to->toDateTimeString()}");

        } catch (\Exception $e) {
            $this->error("Invalid date format: " . $e->getMessage());
            return;
        }

        // Fetch PaymentOrders where controlNo is not null and created_at is within the range
        $paymentOrders = PaymentOrder::whereNotNull('control_no')
            ->whereBetween('created_at', [$from, $to])
            ->get();

        if ($paymentOrders->isEmpty()) {
            $this->info("No payment orders found in the specified range.");
        } else {
            $this->info("Found {$paymentOrders->count()} payment orders. Processing...");

            // Add your logic here for resending invoices
            foreach ($paymentOrders as $paymentOrder) {
                $this->info("Resending invoice for PaymentOrder ID: {$paymentOrder->id}");
                ControlNoUpdated::dispatch($paymentOrder);
            }
        }
    }
}
