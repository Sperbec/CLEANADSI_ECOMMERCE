<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Barrio;

class BarrioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $municipios= Municipio::All();
        $data = ['municipios' => $municipios];
        return view('barrio.index', $data);
    }

    public function obtenerbarrios(Request $request)
    {
        if (isset($request->texto)) {
            $barrios = Barrio::where('id_municipio', $request->texto)->get();
            return response()->json(
                [
                    'lista' => $barrios,
                    'success' => true
                ]
            );
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getBarrioById(Request $request)
    {

        $barrio = Barrio::findOrFail($request->id);
        return response()->json(
            [
                'barrio' => $barrio,
                'success' => true
            ]
        );
    }

    public function store(Request $request)
    {
        $codigobarrio = $request->codigo;
        $nombrebarrio = $request->nombre;
        $id_municipio = $request->municipio;

        $barrio = new Barrio();
        $barrio->id_municipio = $id_municipio;
        $barrio->codigo = $codigobarrio;
        $barrio->nombre = $nombrebarrio;

        $barrio->save();

        return redirect()->route('barrio.index')->with('guardado', 'ok');
    }

    public function updateBarrio(Request $request)
    {

        $codigobarrio = $request->codigo;
        $nombrebarrio = $request->nombre;

        $barrio = Barrio::findOrFail($request->id);
        $barrio->codigo = $codigobarrio;
        $barrio->nombre = $nombrebarrio;

        $barrio->update();

        return response()->json(['success' => true]);
    }

    public function eliminarBarrio(Request $request)
    {
        $barrio = Barrio::findOrFail($request->id);
        $barrio->delete();
        return response()->json(['success' => true]);
       
    }
}
