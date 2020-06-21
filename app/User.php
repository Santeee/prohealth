<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cambiosSolicitados()
    {
        return $this->hasMany('App\CambioTurno', 'solicitante_id');
    }

    public function cambiosCubiertos()
    {
        return $this->hasMany('App\CambioTurno', 'receptor_id');
    }

    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }

    public function hospital()
    {
        return $this->belongsTo('App\Hospital');
    }
}
