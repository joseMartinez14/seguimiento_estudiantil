<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class primer_seguimiento extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'estudiante_id',
        'aprovacion',
        'detalle_curso_id',
        'observaciones',
        'archivo',
        'fecha'
    ];

    public function estudiante()
    {
        return $this->belongsTo('App\Models\estudiante', 'id');
    }
}
