<?php

namespace App\Jobs;

use App\Mail\SendInvoiceMail;
use App\Mail\SendInvoiceMailToAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInvoiceMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $invoice;
    public $invoice_pdf;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $invoice, $invoice_pdf)
    {
        $this->user = $user;
        $this->invoice = $invoice;
        $this->invoice_pdf = $invoice_pdf;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new SendInvoiceMail($this->user, $this->invoice, $this->invoice_pdf));

        Mail::to('shop@gk-jewelland.daloya.com')->send(new SendInvoiceMailToAdmin($this->user, $this->invoice, $this->invoice_pdf));
    }
}
