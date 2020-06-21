<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CambioTurnoService;
use App\CambioTurno;
use App\Sector;
use Auth;

class CambioTurnoController extends Controller
{

    private $cambioTurnoService;

    public function __construct()
    {
        $this->cambioTurnoService = new CambioTurnoService();
    }

    /**
     * Devuelve la vista principal
     * Temporal, ya que la idea es separar front-end y back-end
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $sectores = Sector::all();
        return view('cambios.index', compact('user', 'sectores'));
    }

    /**
     * Devuelve todos los cambios de turnos
     * TODO: agregar paginación
     */
    public function get(Request $request)
    {
        $cambios = Auth::user()->hospital->cambios;

        return response()->json(['cambios' => $cambios], 200);
    }

    /**
     * Guarda el registro de un nuevo cambio de turno
     */
    public function store(Request $request)
    {
        $cambio = $this->cambioTurnoService->store($request);

        return response()->json($cambio, 201);
    }

    /**
     * Cuando un receptor acepta un cambio de turno..
     */
    public function acept(Request $request, $cambio_turno_id)
    {
        $cambio_turno = CambioTurno::find('cambio_turno_id', $cambio_turno_id);
        $cambio_turno = $this->cambioTurnoService->accept($cambio_turno, Auth::user());
        
        return response()->json($cambio_turno, 200);
    }
}
