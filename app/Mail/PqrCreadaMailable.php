<?php

namespace App\Mail;
use App\Models\Pqr;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PqrCreadaMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $pqr;

    public function __construct(Pqr $pqr)
    {
        $this->pqr = $pqr;
    }

    public function build()
    {
        return $this->subject('Confirmación de PQRS')
            ->view('emails.pqr-confirmacion');
    }
}
