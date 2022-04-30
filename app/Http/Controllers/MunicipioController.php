<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Municipio;

class MunicipioController extends Controller
{

    public function index()
    {
        $departamentos= Departamento::All();
        $data = ['departamentos' => $departamentos];
        return view('municipio.index', $data);
    }

    public function obtenermunicipios(Request $request)
    {
        if (isset($request->texto)) {
            $municipios = Municipio::where('id_departamento', $request->texto)->get();
            return response()->json(
                [
                    'lista' => $municipios,
                    'success' => true
                ]
            );
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getMunicipioById(Request $request)
    {

        $municipio = Municipio::findOrFail($request->id);
        return response()->json(
            [
                'municipio' => $municipio,
                'success' => true
            ]
        );
    }

    public function store(Request $request)
    {
        $codigomunicipio = $request->codigo;
        $nombremunicipio = $request->nombre;
        $id_departamento = $request->departamento;

        $municipio = new Municipio();
        $municipio->id_departamento = $id_departamento;
        $municipio->codigo = $codigomunicipio;
        $municipio->nombre = $nombremunicipio;

        $municipio->save();

        return redirect()->route('municipio.index')->with('guardado', 'ok');
    }

    public function updateMunicipio(Request $request)
    {

        $codigomunicipio = $request->codigo;
        $nombremunicipio = $request->nombre;

        $municipio = Municipio::findOrFail($request->id);
        $municipio->codigo = $codigomunicipio;
        $municipio->nombre = $nombremunicipio;

        $municipio->update();

        return response()->json(['success' => true]);
    }

    public function eliminarMunicipio(Request $request)
    {
        $municipio = Municipio::findOrFail($request->id);
        $municipio->delete();
        return response()->json(['success' => true]);
       
    }
}
