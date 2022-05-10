<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paises = Pais::All();
        $data = ['paises' => $paises];
        return view('pais.index', $data);
    }

    public function store(Request $request)
    {


        $codigopais = $request->codigo;
        $nombrepais = $request->nombre;

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


    public function update(Request $request, $id)
    {
        $codigopais = $request->codigo;
        $nombrepais = $request->nombre;

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
