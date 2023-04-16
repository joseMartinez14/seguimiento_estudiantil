<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clase extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'hora_inicio',
        'hora_final',
        'fecha',
        'detalle_curso_id',
        'aula_codigo',
    ];

    public function curso()
    {
        return $this->belongsTo('App\Models\detalle_curso', 'id');
    }
    public function aula()
    {
        return $this->belongsTo('App\Models\aula', 'foreign_key', 'codigo');
    }
    public function asistencia()
    {
        return $this->hasMany('App\Models\asistencia');
    }
    public function listaEstudiantes()
    {
        return $this->belongsToMany('App\Models\estudiante', 'asistencia', 'clase_id', 'estudiante_id');
    }
}
