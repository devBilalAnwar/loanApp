<?php

namespace App\Mail;

use App\Models\Dossier;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DossierSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $dossier;

    /**
     * Create a new message instance.
     *
     * @param Dossier $dossier
     * @return void
     */
    public function __construct(Dossier $dossier)
    {
        $this->dossier = $dossier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@leaze.fr')
                    ->to('contact@leaze.fr')
                    ->subject('Nouveau Dossier Soumis')
                    ->view('emails.dossier.submitted')
                    ->with(['dossier' => $this->dossier]);
    }
}
