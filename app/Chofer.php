<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use Notifiable;
    protected $table = 'choferes';
    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    protected $fillable = [
        'foto_perfil', 'nombres',
        'apellidos', 'cedula','licencia',
        'email', 'password','telefono','user_id'
    ];
}
