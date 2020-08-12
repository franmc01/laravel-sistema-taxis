<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

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

    public function getLastLoginAttribute($date)
    {
        return $date=Carbon::parse($date)->diffForHumans();
    }
}
