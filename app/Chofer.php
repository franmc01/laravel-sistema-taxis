<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chofer extends Model
{
    use Notifiable;
    use SoftDeletes;
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
