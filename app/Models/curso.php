<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $primaryKey = 'codigo';
    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'nombre',
        'curso_necesario'
    ];

    public function detalle_curso()
    {
        return $this->hasOne('App\Models\detalle_curso', 'foreign_key', 'codigo');
    }

}
