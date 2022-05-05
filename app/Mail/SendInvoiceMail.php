<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $invoice;
    public $invoice_pdf;
    public function __construct($user, $invoice, $invoice_pdf)
    {
        $this->user = $user;
        $this->invoice = $invoice;
        $this->invoice_pdf = $invoice_pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Your Invoice')
                    ->markdown('emails.invoice-mail')
//                    ->with('url_test', ['test' => $this->invoice_pdf])
                    ->with('data', ['pdf_url' => $this->invoice_pdf])
                    ->attach($this->invoice_pdf);
    }
}
