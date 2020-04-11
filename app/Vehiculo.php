<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use Notifiable;
    use SoftDeletes;
    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    protected $fillable = [
        'marca', 'tipoVehiculo',
        'placa', 'anio',
        'user_id',
    ];
}
