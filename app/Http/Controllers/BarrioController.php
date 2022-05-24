<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Barrio;
use App\Http\Requests\StoreForm;

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

    public function store(StoreForm $request)
    {
        $codigobarrio = $request->codigo_barrio;
        $nombrebarrio = $request->nombre_barrio;
        $id_municipio = $request->municipio;

        $barrio = new Barrio();
        $barrio->id_municipio = $id_municipio;
        $barrio->codigo = $codigobarrio;
        $barrio->nombre = $nombrebarrio;

        $barrio->save();

        return redirect()->route('barrio.index')->with('guardado', 'ok');
    }

    public function updateBarrio(StoreForm $request)
    {

        $codigobarrio = $request->codigobarrioeditar;
        $nombrebarrio = $request->nombrebarrioeditar;

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
