<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Opciones_definidas;
use App\Models\Persona;

class PersonaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sql = 'SELECT * from personas';

        $clientes = DB::select($sql);
        $data = ['clientes' => $clientes];

        return view('persona.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_personas = Opciones_definidas::where('variable', '00tipopersona')->get();
        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();

        $data = [
            'tipos_personas' => $tipos_personas,
            'tipos_documentos' => $tipos_documentos,
            'generos' => $generos
        ];
        return view('persona.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $tipos_documento = $request->tipo_documento;
        $documento = $request->numero_documento;
        $genero = $request->genero;
        $caledario = $request->calendario;

        $persona = new Persona();

        $persona->nombres = $nombres;
        $persona->apellidos = $apellidos;
        $persona->id_opcion_genero = $genero;
        $persona->id_opcion_tipo_documento = $tipos_documento;
        $persona->numero_documento = $documento;
        $persona->natalicio = $caledario;
        $persona->habilitado = 1;

        $persona->save();

        return redirect()->route('clientes.index')->with('guardado', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Persona::FindOrFail($id);
        $tipos_personas = Opciones_definidas::where('variable', '00tipopersona')->get();
        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();

        $data = [
            'tipos_personas' => $tipos_personas,
            'tipos_documentos' => $tipos_documentos,
            'generos' => $generos,
            'cliente' => $cliente
        ];

        return view('persona.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $tipos_documento = $request->tipo_documento;
        $documento = $request->numero_documento;
        $genero = $request->genero;
        $caledario = $request->calendario;

        $persona = Persona::findOrFail($id);
        $persona->nombres = $nombres;
        $persona->apellidos = $apellidos;
        $persona->id_opcion_genero = $genero;
        $persona->id_opcion_tipo_documento = $tipos_documento;
        $persona->numero_documento = $documento;
        $persona->natalicio = $caledario;
        $persona->habilitado = 1;

        $persona->update();

        return redirect()->route('clientes.index')->with('editado', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();
        return redirect()->route('clientes.index')->with('eliminado', 'ok');
    }
}
