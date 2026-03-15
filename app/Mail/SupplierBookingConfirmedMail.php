<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class SupplierBookingConfirmedMail extends Mailable
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
                . ($this->booking->product_title ?? '')
                . ' | '
                . ($this->booking->booking_uid ?? '')
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.supplier_booking_confirmed',
            with: [
                'booking' => $this->booking
            ]
        );
    }
}
