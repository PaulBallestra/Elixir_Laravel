<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BuyersConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->from('payment@elixir.com')
            ->subject('Votre abonnement a été souscrit !')
            ->with([
                'objet' => 'Votre abonnement a été souscrit !',
                'content_email' => $this->details['content_email']
            ])
            ->view('emails.buyers-mail');
    }
}
