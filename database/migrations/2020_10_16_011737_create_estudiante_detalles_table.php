<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_detalles', function (Blueprint $table) {
            $table->integer('estudiante_id');
            $table->unique('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');

            $table->date('fecha_nacimiento')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('tel_celular')->nullable();
            $table->integer('tel_habitacion')->nullable();
            $table->string('estado_civil', 45)->nullable();
            $table->integer('hijos')->nullable();
            $table->string('zona_procedencia', 100)->nullable();
            $table->string('direccion_actual', 255)->nullable();
            $table->string('familiares_convive', 255)->nullable();
            $table->string('familiares_relacion', 255)->nullable();
            $table->string('familiares_apoyo', 255)->nullable();

            $table->string('financiamiento', 45)->nullable();
            $table->string('trabaja',2)->nullable();
            $table->string('trabajoLugar', 50)->nullable();
            $table->string('trabajoJornada', 100)->nullable();
            $table->string('trabajoMotivo', 255)->nullable();

            //ANTECEDENTES
            $table->string('antecedenteInstitucion', 255)->nullable();
            $table->string('antecedenteModalidadEgreso', 100)->nullable();
            $table->integer('antecedenteAnnoEgreso')->nullable();
            $table->string('antecedenteReprobo', 255)->nullable();
            $table->string('antecedenteMateriasDificiles', 255)->nullable();
            $table->string('antecedenteAdecuacion',2)->nullable();
            $table->string('antecedenteAdecuacionCuando', 11)->nullable();
            $table->string('antecedenteAdecuacionTipo', 255)->nullable();

            //DATOS UNIVERSITARIO
            $table->string('universidadAdecuacion', 100)->nullable();
            $table->string('universidadCarrera', 100)->nullable();
            $table->string('universidadCampus', 100)->nullable();
            $table->integer('universidadAnnoIngreso')->nullable();
            $table->string('universidadNivel', 100)->nullable();
            $table->string('universidadOpcion', 100)->nullable();
            $table->string('universidadMotivacion', 255)->nullable();
            $table->string('universidadSatisfecho', 255)->nullable();
            $table->string('universidadOtraCarrera', 100)->nullable();
            $table->string('universidadOtraCarreraInstitucion', 255)->nullable();
            $table->string('universidadCursosRepetidos', 255)->nullable();
            $table->string('universidadHoraConsulta', 255)->nullable();
            $table->integer('universidadCursosMatriculados')->nullable();
            $table->integer('universidadHoraEstudio')->nullable();
            $table->string('universidadTecnicasEstudio', 255)->nullable();
            $table->string('universidadPuntualClases', 255)->nullable();
            $table->string('universidadFactoresFavorecen', 255)->nullable();
            $table->string('universidadFactoresObtaculizan', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante_detalles');
    }
}
