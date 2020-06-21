<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CambioTurno extends Model
{
    use SoftDeletes;
    
    protected $table = 'cambios_turnos';

    public function solicitante()
    {
        return $this->belongsTo('App\User', 'solicitante_id');
    }

    public function receptor()
    {
        return $this->belongsTo('App\User', 'receptor_id');
    }

    public function sector()
    {
        return $this->belongsTo('App\Sector', 'sector_id');
    }
}
