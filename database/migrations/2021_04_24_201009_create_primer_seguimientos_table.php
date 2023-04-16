<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimerSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primer_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->string('aprovacion', 20)->nullable();
            $table->bigInteger('detalle_curso_id')->unsigned()->nullable();
            $table->foreign('detalle_curso_id')->references('id')->on('detalle_cursos')->onDelete('cascade');
            $table->text('observaciones')->nullable();
            $table->string('archivo',255)->nullable();
            $table->dateTime('fecha')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('primer_seguimientos');
    }
}
