<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reunion extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'asesor_id',
        'estudiante_id',
        'start',
        'end',
        'duracion',
        'descripcion',
        'title',
        'estado',
        'backgroundColor',
        'textColor'
    ];


    public function estudiante()
    {
        return $this->belongsTo('App\Models\estudiante','estudiante_id');
    }
    public function asesor()
    {
        return $this->belongsTo('App\Models\asesor','id');
    }
}
