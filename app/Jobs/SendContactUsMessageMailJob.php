<?php

namespace App\Jobs;

use App\Mail\SendContactUsMessageMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactUsMessageMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $message;
    public $send_copy;
    public function __construct($name, $email, $message, $send_copy)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->send_copy = $send_copy;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('shop@gk-jewelland.daloya.com')->when(isset($this->send_copy), function ($query) {
            $query->cc($this->email);
        })->send(new SendContactUsMessageMail($this->name, $this->email, $this->message));
    }
}
