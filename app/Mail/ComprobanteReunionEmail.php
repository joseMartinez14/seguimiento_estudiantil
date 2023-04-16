<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComprobanteReunionEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject = "Comprobante Reunion";
    public $estudiante;
    public $reunion;
    public $seguimiento;
    public $tipo;


    public function __construct($estudiante, $reunion, $seguimiento, $tipo)
    {
        $this->estudiante = $estudiante;
        $this->reunion = $reunion;
        $this->seguimiento = $seguimiento;
        $this->tipo = $tipo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos/comprobanteReunion')
            ->with('reunion', $this->reunion)
            ->with('estudiante', $this->estudiante)
            ->attachFromStorage('public/' . $this->estudiante->id . "/" . $this->tipo . $this->estudiante->id . "-" . $this->seguimiento . ".pdf");
    }
}
