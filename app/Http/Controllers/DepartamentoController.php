<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreForm;

class DepartamentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {
        $sql = 'SELECT roles.id 
        FROM usuarios
        inner join model_has_roles mhr on mhr.model_id = usuarios.id_usuario 
        inner join roles on roles.id = mhr.role_id 
        where id_usuario = ' . auth()->user()->id_usuario;

        $rol = DB::select($sql);

        if ($rol[0]->id == 2) {
            return redirect('/');
        }
        
        $paises = Pais::All();
        $data = ['paises' => $paises];
        return view('departamento.index', $data);
    }

    public function obtenerdepartamentos(Request $request)
    {
        if (isset($request->texto)) {
            $departamentos = Departamento::where('id_pais', $request->texto)->get();
            return response()->json(
                [
                    'lista' => $departamentos,
                    'success' => true
                ]
            );
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getDepartamentoById(Request $request)
    {

        $departamento = Departamento::findOrFail($request->id);
        return response()->json(
            [
                'departamento' => $departamento,
                'success' => true
            ]
        );
    }

    public function store(StoreForm $request)
    {
        $codigodepartamento = $request->codigo_departamento;
        $nombredepartamento = $request->nombre_departamento;
        $id_pais = $request->pais;

        $departamento = new Departamento();
        $departamento->id_pais = $id_pais;
        $departamento->codigo = $codigodepartamento;
        $departamento->nombre = $nombredepartamento;

        $departamento->save();

        return redirect()->route('departamento.index')->with('guardado', 'ok');
    }

    public function updateDepartamento(Request $request)
    {

        $codigodepartamento = $request->codigo;
        $nombredepartamento = $request->nombre;

        $departamento = Departamento::findOrFail($request->id);
        $departamento->codigo = $codigodepartamento;
        $departamento->nombre = $nombredepartamento;

        $departamento->update();

        return response()->json(['success' => true]);
    }

    public function eliminarDepartamento(Request $request)
    {

         //Si el departamento está relacionado a un municipio no se puede eliminar.
         $sql = 'SELECT  id_departamento from municipios
         where id_departamento = '.$request->id;

         $municipios_relacionados = DB::select($sql);

         if(empty($municipios_relacionados)){
            $departamento = Departamento::findOrFail($request->id);
            $departamento->delete();
            return response()->json(['success' => true]);
         }else{
            return response()->json(['success' => false]);
         }

    }
}
