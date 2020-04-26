<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function vehiculos()
    {
        return $this->hasOne('App\Vehiculo');
    }
    public function cuotas()
    {
        return $this->hasMany('App\Cuota');
    }
    protected $fillable = [
        'foto_perfil', 'nombres',
        'apellidos', 'cedula',
        'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password']=bcrypt($password);
    // }

}
