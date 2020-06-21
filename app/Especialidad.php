<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialidad extends Model
{
    use SoftDeletes;
    
    protected $table = 'especialidades';
    
    public function usuarios()
    {
        return $this->hasMany('App\User');
    }
}
