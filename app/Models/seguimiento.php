<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seguimiento extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'descripcion',
        'horario_asesor_id',
        'estudiante_id',
    ];

    public function estudiante()
    {
        return $this->belongsTo('App\Models\estudiante','estudiante_id');
    }
    public function horario_asesor()
    {
        return $this->belongsTo('App\Models\horario_asesor', 'id');
    }
}
