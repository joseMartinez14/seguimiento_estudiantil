<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_curso extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'anno',
        'periodo',
        'num_periodo',
        'curso_codigo',
        'tutor_id',

        'hora_inicio',
        'hora_final',
        'dia',
    ];

    public function curso()
    {
        return $this->belongsTo('App\Models\curso', 'foreign_key', 'codigo');
    }
    public function tutor()
    {
        return $this->belongsTo('App\Models\tutor', 'id');
    }
    public function clase()
    {
        return $this->hasMany('App\Models\clase', 'detalle_curso_id');
    }
    public function lista_curso_estudiante()
    {
        return $this->hasMany('App\Models\lista_curso_estudiante', 'detalle_curso_id');
    }
    public function listaEstudiantes()
    {
        return $this->belongsToMany('App\Models\estudiantes', 'lista_curso_estudiante','detalle_curso_id', 'estudiante_id');
    }
}
