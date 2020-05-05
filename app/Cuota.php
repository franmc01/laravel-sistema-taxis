<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    protected $fillable = [
        'pago', 'monto',
        'user_id', 'observacion',
        'fecha'
    ];

    //Query Scope

    public function scopeFecha1($query, $fecha1)
    {
        if($fecha1)
            return $query->where('fecha','>=',$fecha1);
    }
    public function scopeFecha2($query, $fecha2)
    {
        if($fecha2)
            return $query->where('fecha','<=',$fecha2);
    }
    public function scopeUser($query, $user)
    {
        if($user)
            return $query->where('user_id',$user);
    }
}
