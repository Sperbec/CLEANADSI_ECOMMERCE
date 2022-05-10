<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Opciones_definidas;
use App\Models\Persona;
use App\Http\Requests\StoreForm;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class PersonaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $sql = 'SELECT * from personas
         inner join model_has_roles mhr on mhr.model_id = personas.id_persona  
         where id_persona not in (select id_persona from proveedores
         where id_persona is not null)
         and role_id =2';

        $clientes = DB::select($sql);
        $data = ['clientes' => $clientes];

        return view('persona.index', $data);
    }

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


    public function store(StoreForm $request)
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

        if ($persona->save()) {
            $usuario = new User;
            $usuario->id_persona = ($persona->id_persona);
            $usuario->email =  $request->email;
            $usuario->password = Hash::make('12345678');

            if ($usuario->save()) {
                $usuario->assignRole('Cliente');
            }
        }

        return redirect()->route('clientes.index')->with('guardado', 'ok');
    }

   
    public function show($id)
    {
        $cliente = Persona::FindOrFail($id);
        $tipos_personas = Opciones_definidas::where('variable', '00tipopersona')->get();
        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();

        $usuario = DB::table('usuarios')->where('id_persona', $id)->first();

        $data = [
            'tipos_personas' => $tipos_personas,
            'tipos_documentos' => $tipos_documentos,
            'generos' => $generos,
            'cliente' => $cliente,
            'usuario' => $usuario
        ];
        
        return view('persona.show', $data);
    }

    
    public function edit($id)
    {
        $cliente = Persona::FindOrFail($id);
        $tipos_personas = Opciones_definidas::where('variable', '00tipopersona')->get();
        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();

        $usuario = DB::table('usuarios')->where('id_persona', $id)->first();



        $data = [
            'tipos_personas' => $tipos_personas,
            'tipos_documentos' => $tipos_documentos,
            'generos' => $generos,
            'cliente' => $cliente,
            'usuario' => $usuario
        ];

        return view('persona.edit', $data);
    }

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

        //Actualizo el email de la tabla usuarios
        $usuario = DB::table('usuarios')->where('id_persona', $id)->first();
        $usuario = User::findOrFail($usuario->id_usuario);
        $usuario->email = $request->email;
        $usuario->update();

        return redirect()->route('clientes.index')->with('editado', 'ok');
    }

    public function destroy($id)
    {
        //Elimino la persona
        $persona = Persona::findOrFail($id);
        $persona->delete();

        //Elimino el rol que tiene el usuario
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        //Elimino el usuario
        DB::table('usuarios')->where('id_persona', $id)->delete();

        return redirect()->route('clientes.index')->with('eliminado', 'ok');
    }
}
