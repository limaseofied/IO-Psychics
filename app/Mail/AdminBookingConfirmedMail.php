<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class AdminBookingConfirmedMail extends Mailable
{
    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Booking Received | '
                . ($this->booking->booking_uid ?? '')
                . ' | '
                . ($this->booking->full_name ?? 'Guest')
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_booking_confirmed',
            with: [
                'booking' => $this->booking
            ]
        );
    }
}
