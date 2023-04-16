<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lista_asesor_estudiante extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'asesor_id',
        'estudiante_id',
    ];

    public function asesor()
    {
        return $this->belongsTo('App\Models\asesor', 'id');
    }
    public function estudiante()
    {
        return $this->belongsTo('App\Models\estudiante','estudiante_id');
    }
}
