<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $traveldetails,$det;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($traveldetails,$det)
    {
        $this->traveldetails=$traveldetails;
        $this->det=$det;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tour Booking Order from OffroadNepal Website ')->view('emails.BookingMail');
    }
}
