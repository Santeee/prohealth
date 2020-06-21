<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    /**
     * Return the view where de info about the user burnout
     */
    public function burnout(Request $request)
    {
        $user = Auth::user();
        $cambios_solicitados = $user->cambiosSolicitados;
        $cambios_cubiertos = $user->cambiosCubiertos;

        $horas_solicitadas = 0;
        foreach ($cambios_solicitados as $key => $value) {
            $horas_solicitadas = $horas_solicitadas + Carbon::parse($value->hora_fin)->diffInHours(Carbon::parse($value->hora_comienzo));
        }

        $horas_cubiertas = 0;
        foreach ($cambios_cubiertos as $key => $value) {
            $horas_cubiertas = $horas_cubiertas + Carbon::parse($value->hora_fin)->diffInHours(Carbon::parse($value->hora_comienzo));
        }

        return view('burnout.index', compact('user', 'cambios_solicitados', 'cambios_cubiertos', 'horas_cubiertas', 'horas_solicitadas'));
    }
}
