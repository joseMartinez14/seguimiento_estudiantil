<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactanosMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject = "Actualizacion de la Informacion";
    public $nombre;
    public $apellido;


    public function __construct($nombre)
    {
        $this->nombre = $nombre;
 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos/actuinformacion')->with('estudiante', $this->nombre);
    }
}
