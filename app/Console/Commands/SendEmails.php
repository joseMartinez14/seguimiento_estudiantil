<?php

namespace App\Console\Commands;

use App\Models\reunion;
use App\Models\estudiante;
use App\Models\asesor;
use DateTime;
use DateTimeZone;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecordarCitaEmail;
use App\Mail\RecordatorioCitaAsesor;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reunions:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar mensajes de recordatoria de reunion';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Obtener Hoy
        $tz = new DateTimeZone("America/Costa_Rica");
        $date_time_now = new DateTime("now", $tz);
        $ahora = $date_time_now->format('d/m/y H:i');

        $this->info("Ahora: " . $ahora);

        $reuniones = reunion::where('estado', 'Pendiente')->get();

        foreach ($reuniones as $reunion) {
            $estudiante = estudiante::find($reunion->estudiante_id)->user;
            $asesor = asesor::find($reunion->asesor_id)->user;

            $date_time_reunion = new DateTime($reunion->start);

            $formated_date = $date_time_reunion->modify('-1 day')->format('d/m/y H:i');

            if ($ahora == $formated_date) {
                $correo1 = new RecordarCitaEmail($estudiante, $reunion, $asesor);
                $correo2 = new RecordatorioCitaAsesor($estudiante, $reunion, $asesor);
                Mail::to($estudiante->email)->send($correo1);
                Mail::to($asesor->email)->send($correo2);
                $this->info("Enviando Correo a " . $estudiante->name . " " . $estudiante->apellido);
            }
        }
    }
}
