<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\CahierCharges;

class CahierChargesSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $cahierCharges;

    /**
     * Create a new message instance.
     *
     * @param CahierCharges $cahierCharges
     * @return void
     */
    public function __construct(CahierCharges $cahierCharges)
    {
        $this->cahierCharges = $cahierCharges;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cahier_charges_submitted');
    }
}
