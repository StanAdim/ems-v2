<?php

namespace App\Mail;

use App\Models\PaymentOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Number;

class PaymentOrderInvoice extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public PaymentOrder $paymentOrder)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Order Invoice for ' . $this->paymentOrder->description,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.payment-order.invoice',
            with: [
                'description' => $this->paymentOrder->description,
                'controlNumber' => $this->paymentOrder->control_no,
                'expiresOn' => $this->paymentOrder->expires_on->format('F j, Y'),
                'attachementLink' => $this->paymentOrder->invoice_url,
                'totalPrice' => 'TZS ' . Number::format($this->paymentOrder->total_amount),
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
