<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesPrimerSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_primer_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->string('materiaTutoria', 45);
            $table->string('profesorCurso', 45);
            $table->integer('creditoCruso');
            $table->string('situacion', 255);
            $table->string('tipoTutoria', 13);
            $table->string('estado', 20);
            $table->dateTime('fechaSolicitud')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes_primer_seguimientos');
    }
}
