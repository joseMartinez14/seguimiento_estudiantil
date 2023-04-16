<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
