<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario_asesor extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'asesor_id',
        'titulo',
        'inicio',
        'final'        
    ];

    public function asesor()
    {
        return $this->belongsTo('App\Models\asesor','id');
    }
}
