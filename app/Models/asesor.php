<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asesor extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }
    public function lista_asesor_estudiante()
    {
        return $this->hasMany('App\Models\lista_asesor_estudiante', 'asesor_id');
    }
    public function horario_asesor()
    {
        return $this->hasMany('App\Models\horario_asesor','asesor_id');
    }
    public function listaEstudiantes()
    {
        return $this->belongsToMany('App\Models\estudiante', 'lista_asesor_estudiantes', 'asesor_id', 'estudiante_id');
    }
    public function reunion()
    {
        return $this->hasMany('App\Models\reunion', 'estudiante_id');
    }
}
