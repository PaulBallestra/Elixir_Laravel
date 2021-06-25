<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }


    public function build()
    {
        return $this->from($this->details['email_address'])
            ->subject($this->details['objet'])
            ->with([
                'objet' => $this->details['objet'],
                'content_email' => $this->details['content_email']
            ])
            ->view('emails.contact-mail');
    }
}
