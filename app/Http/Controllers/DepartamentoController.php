<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Pais;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            return response()->json(
                [
                    'success' => false
                ]
            );
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



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codigodepartamento = $request->codigo;
        $nombredepartamento = $request->nombre;
        $id_pais = $request->pais;

        $departamento = new Departamento();
        $departamento->id_pais = $id_pais;
        $departamento->codigo = $codigodepartamento;
        $departamento->nombre = $nombredepartamento;

        $departamento->save();

        return redirect()->route('departamento.index')->with('guardado', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $codigodepartamento = $request->codigo;
        $nombredepartamento = $request->nombre;

        $departamento = Departamento::findOrFail($request->id);
        $departamento->codigo = $codigodepartamento;
        $departamento->nombre = $nombredepartamento;

        $departamento->update();

        return response()->json(
            [
                'success' => true
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamento.index')->with('eliminado', 'ok');
    }
}
