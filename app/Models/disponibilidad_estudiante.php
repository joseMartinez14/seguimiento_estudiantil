<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class disponibilidad_estudiante extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'estudiante_id',
        'dia',
        'hora'
    ];

    public function estudiante()
    {
        return $this->belongsTo('App\Models\estudiante', 'id');
    }
}
