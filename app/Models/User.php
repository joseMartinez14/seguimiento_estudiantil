<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'usuario',
        'rol',
        'password',
        'id',
        'name',
        'apellido',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $timestamps = false;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /*public function persona()
    {
        return $this->hasOne('App\Models\persona');
    }*/
    public function postulante()
    {
        return $this->hasOne('App\Models\postulante', 'id');
    }
    public function estudiante()
    {
        return $this->hasOne('App\Models\estudiante', 'id');
    }
    public function adminitrador()
    {
        return $this->hasOne('App\Models\adminitrador', 'id');
    }
    public function asesor()
    {
        return $this->hasOne('App\Models\asesor', 'id');
    }
    public function tutor()
    {
        return $this->hasOne('App\Models\tutor', 'id');
    }
}
