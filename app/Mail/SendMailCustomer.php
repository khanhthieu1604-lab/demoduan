<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailCustomer extends Mailable
{
    use Queueable, SerializesModels;

    
    protected $customers;

    public function __construct($customers)
    {
        $this->customers = $customers;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from'))
        ->subject('Contract for your vihicle')
        ->view('mainview.layouts.send_mail_customer',['customers' => $this->customers]);
    }
}
