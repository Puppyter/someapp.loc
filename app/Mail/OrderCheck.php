<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCheck extends Mailable
{
    use Queueable, SerializesModels;

    protected $invoice;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice, $user)
    {
        $this->invoice = $invoice;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.orderCheck',['invoice'=>$this->invoice]);
    }
}
