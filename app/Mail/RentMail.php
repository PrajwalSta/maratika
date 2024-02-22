<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $rentdetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rentdetails)
    {
        $this->rentdetails=$rentdetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Rent Bike of OffroadNepal from Website')->view('emails.RentMail');
    }
}
