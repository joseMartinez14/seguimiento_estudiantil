<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiante_detalle extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'estudiante_id',
        'fecha_nacimiento',
        'edad',
        'tel_celular',
        'tel_habitacion',
        'estado_civil',
        'hijos',
        'zona_procedencia',
        'direccion_actual',
        'familiares_convive',
        'familiares_relacion',
        'familiares_apoyo',
        'financiamiento',
        'trabaja',
        'trabajoLugar',
        'trabajoJornada',
        'trabajoMotivo',
        'antecedenteInstitucion',
        'antecedenteModalidadEgreso',
        'antecedenteAnnoEgreso',
        'antecedenteReprobo',
        'antecedenteMateriasDificiles',
        'antecedenteAdecuacion',
        'antecedenteAdecuacionCuandoid',
        'antecedenteAdecuacionTipo',
        'universidadAdecuacion',
        'universidadCarrera',
        'universidadCampus',
        'universidadAnnoIngreso',
        'universidadNivel',
        'universidadOpcion',
        'universidadMotivacion',
        'universidadSatisfecho',
        'universidadOtraCarrera',
        'universidadOtraCarreraInstitucion',
        'universidadCursosRepetidos',
        'universidadHoraConsulta',
        'universidadCursosMatriculados',
        'universidadHoraEstudio',
        'universidadTecnicasEstudio',
        'universidadPuntualClases',
        'universidadFactoresFavorecen',
        'universidadFactoresObtaculizan'
    ];

    public function estudiante()
    {
        return $this->belongsTo('App\Models\estudiante', 'id');
    }
}
