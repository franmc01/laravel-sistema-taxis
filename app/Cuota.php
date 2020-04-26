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
        'created_at', 'updated_at',
    ];
}
