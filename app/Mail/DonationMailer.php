<?php

namespace App\Mail;

use App\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DonationMailer extends Mailable
{
    use Queueable, SerializesModels;



    public $var;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Donation $donation_request)
    {
        $this->var = $donation_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.donation');
    }
}
