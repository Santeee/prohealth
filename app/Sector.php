<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use SoftDeletes;
    
    protected $table = 'sectores';

    public function sectores()
    {
        return $this->hasMany('App\CambioTurno');
    }
}
