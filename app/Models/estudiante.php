<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'estado',
        'archivo'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }
    public function lista_curso_estudiante()
    {
        return $this->hasMany('App\Models\lista_curso_estudiante', 'estudiante_id');
    }
    public function asistencia()
    {
        return $this->hasMany('App\Models\asistencia', 'estudiante_id');
    }
    public function seguimiento()
    {
        return $this->hasMany('App\Models\seguimiento','estudiante_id');
    }
        public function lista_asesor_estudiante()
    {
        return $this->hasMany('App\Models\lista_asesor_estudiante','estudiante_id');
    }
    public function listaAsesores()
    {
        return $this->belongsToMany('App\Models\asesor', 'lista_asesor_estudiantes','estudiante_id', 'asesor_id');
    }
    public function listaCursos()
    {
        return $this->belongsToMany('App\Models\detalle_curso', 'lista_curso_estudiante', 'estudiante_id', 'detalle_curso_id');
    }
    public function listaClases()
    {
        return $this->belongsToMany('App\Models\clase', 'asistencia', 'estudiante_id', 'clase_id');
    }
    public function estudiante_detalle()
    {
        return $this->hasOne('App\Models\estudiante_detalle', 'estudiante_id');
    }
    public function primer_seguimiento()
    {
        return $this->hasOne('App\Models\primer_seguimiento', 'estudiante_id');
    }
    public function disponibilidad_estudiante()
    {
        return $this->hasMany('App\Models\disponibilidad_estudiante', 'estudiante_id');
    }
    public function seguimiento_regular()
    {
        return $this->hasMany('App\Models\seguimiento_regular', 'estudiante_id');
    }
    public function reunion()
    {
        return $this->hasMany('App\Models\reunion', 'estudiante_id');
    }
}
