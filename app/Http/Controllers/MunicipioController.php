<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


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

          //Si el municipio está relacionado a un barrio no se puede eliminar.
          $sql = 'SELECT  id_municipio from barrios
          where id_municipio = '.$request->id;

          $barrios_relacionados = DB::select($sql);

          if(empty($barrios_relacionados)){
            $municipio = Municipio::findOrFail($request->id);
            $municipio->delete();
            return response()->json(['success' => true]);
          }else{
             return response()->json(['success' => false]);
          }

    }
}
