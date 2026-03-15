<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Holds form data

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('New Contact Form Submission - '.$this->data['first_name'].' '.$this->data['last_name'])
                    ->view('emails.contact-submitted')
                    ->with('data', $this->data);
    }
}
