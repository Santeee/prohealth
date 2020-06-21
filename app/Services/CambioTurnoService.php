<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\CambioTurno;
use App\User;
use Carbon\Carbon;
use Auth;
class CambioTurnoService
{
    /**
     *  Guarda un cambio de turno nuevo...
     *  @return CambioTurno
     */
    public function store(Request $request): CambioTurno
    {   
        $request->merge([
            'dia' => Carbon::createFromFormat('d/m/Y', $request->dia)->format('Y-m-d'),
            'solicitante_id' => Auth::user()->id,
        ]);

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