<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lista_curso_estudiante extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'detalle_curso_id',
        'estudiante_id',
    ];

    public function detalle_curso()
    {
        return $this->belongsTo('App\Models\detalle_curso', 'id');
    }
    public function estudiante()
    {
        return $this->belongsTo('App\Models\estudiante', 'id');
    }
}
