<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'marca', 'tipoVehiculo',
        'placa', 'anio',
        'idUser',
    ];
}
