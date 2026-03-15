<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCancelledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this
            ->subject('Booking Cancelled - ' . $this->booking->booking_uid)
            ->view('emails.booking-cancelled')
            ->with('booking', $this->booking);
    }
}
