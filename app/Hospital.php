<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospitales';

    public function personal()
    {
        return $this->hasMany('App\User');
    }

    public function cambios()
    {
        return $this->hasManyThrough('App\CambioTurno', 'App\User', 'hospital_id', 'solicitante_id');
    }
}
