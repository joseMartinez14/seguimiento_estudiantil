<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aula extends Model
{
    protected $primaryKey = 'codigo';
    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'sede',
        'nombre'
    ];

    public function clase()
    {
        return $this->hasMany('App\Models\clase',  'codigo');
    }

}
