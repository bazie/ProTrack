<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessagePersonnaliseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;
    public $contenu;

    public $subject;



    public function __construct($nom, $subject, $contenu)
    {

        $this->nom = $nom;
        $this->subject = $subject;
        $this->contenu = $contenu;
    }

    public function build()
    {
        return $this->subject($this->subject)
            ->view('backend.mail.alert-mail', [
                'nom' => $this->nom,
                'contenu' => $this->contenu,
                'subject' => $this->subject,
            ]);
    }
}
