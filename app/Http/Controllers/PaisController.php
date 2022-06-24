<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreForm;

class PaisController extends Controller
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
        return view('pais.index', $data);
    }

    public function store(StoreForm $request)
    {


        $codigopais = $request->codigo_pais;
        $nombrepais = $request->nombre_pais;

        $pais = new Pais();
        $pais->codigo = $codigopais;
        $pais->nombre = $nombrepais;

        $pais->save();

        return redirect()->route('pais.index')->with('guardado', 'ok');
    }


    public function edit($id)
    {
        $pais = Pais::findOrFail($id);
        $data = ['pais' => $pais];
        return view('pais.edit', $data);
    }


    public function update(StoreForm $request, $id)
    {
        $codigopais = $request->codigo_pais;
        $nombrepais = $request->nombre_pais;

        $pais = Pais::findOrFail($id);
        $pais->codigo = $codigopais;
        $pais->nombre = $nombrepais;

        $pais->update();

        return redirect()->route('pais.index')->with('editado', 'ok');
    }

    public function destroy($id){

        //Si el país está relacionado a un departamento no se puede eliminar.
        $sql = 'SELECT  id_pais from departamentos
        where id_pais = '.$id;

        $departamentos_relacionados = DB::select($sql);

        if(empty($departamentos_relacionados)){
            $pais = Pais::findOrFail($id);
            $pais->delete();
            return redirect()->route('pais.index')->with('eliminado', 'ok');
        }else{
            return redirect()->route('pais.index')->with('error', 'ok');
        }

    }
}
