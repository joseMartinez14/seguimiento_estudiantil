<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecordarCitaEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject = "Recordatorio de reunión";
    public $estudiante;
    public $asesor;
    public $reunion;

    public function __construct($estudiante, $reunion, $asesor)
    {
        $this->estudiante = $estudiante;
        $this->asesor = $asesor;
        $this->reunion = $reunion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos/recordarCita')->with('reunion', $this->reunion)->with('estudiante', $this->estudiante)->with('asesor', $this->asesor);
    }
}
