<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class BookingConfirmedMail extends Mailable
{
    public $booking; // ✅ DEFINE PROPERTY

    public function __construct($booking)
    {
        $this->booking = $booking; // ✅ ASSIGN IT
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'You have received a new Booking - '
                . ($this->booking->full_name ?? 'Guest')
                . ' - '
                . ($this->booking->booking_uid ?? '')
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking_confirmed',
            with: [
                'booking' => $this->booking
            ]
        );
    }
}
