<?php
namespace App\Services;

use App\CambioTurno;
use App\User;

class CambioTurnoService
{
    /**
     *  Guarda un cambio de turno nuevo...
     *  @return CambioTurno
     */
    public function store(Request $request): CambioTurno
    {
        $cambio = CambioTurno::create($request->all());
        return $cambio;
    }
    /**
     * Guarda el registro de cuando un personal acepta cubrir un turno.
     */
    public function accept(CambioTurno $cambioTurno, User $personal): CambioTurno
    {
        $cambioTurno->aceptado = true;
        $cambioTurno->receptor_id = $personal->id;
        $cambioTurno->save();

        return $cambioTurno;
    }
} 