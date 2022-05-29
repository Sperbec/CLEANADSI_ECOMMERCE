<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Opciones_definidas;
use App\Models\Municipio;
use App\Models\Persona_contacto;
use App\Models\Barrio;
use App\Http\Requests\StoreForm;
use App\Models\Categoria;

class CuentaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

   public function index(){

        //Consulto los datos de la persona que está logueada
        $sql = 'SELECT id_usuario, nombres,apellidos , email,
         id_opcion_tipo_documento, numero_documento,
         id_opcion_genero, natalicio,
         documento.nombre as tipodocumento, genero.nombre as tipogenero
        from usuarios
        inner join personas on personas.id_persona = usuarios.id_persona
        inner join opciones_definidas documento on documento.id_opcion =personas.id_opcion_tipo_documento
        inner join opciones_definidas genero on genero.id_opcion = personas.id_opcion_genero
        where id_usuario = '.auth()->user()->id_usuario;

        $usuario = DB::select($sql);

        $tipos_contactos = Opciones_definidas::where('variable', '00contacto')->get();
        $municipios= Municipio::All();

        $usuarioLogin = User::findOrFail(auth()->user()->id_usuario);

        //Consulto los datos de contacto
        $sql2 = 'SELECT persona_contacto.id_persona_contacto, id_opcion_contacto,
        opciones_definidas.nombre as opcioncontacto, persona_contacto.valor, barrios.nombre as nombrebarrio
        FROM persona_contacto
        inner join opciones_definidas on opciones_definidas.id_opcion = persona_contacto.id_opcion_contacto
        left join barrios on persona_contacto.id_barrio = barrios.id_barrio
        WHERE  deleted_at  is null and  id_persona = '.$usuarioLogin->id_persona;

        $datos_contacto =  DB::select($sql2);

        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();

        $categorias = Categoria::all();

        $data = ['usuario' => $usuario[0],
                'tipos_contactos' => $tipos_contactos,
                'municipios' => $municipios,
                'datos_contacto' => $datos_contacto,
                'tipos_documentos' => $tipos_documentos,
                'generos' => $generos,
                'categorias' => $categorias];


        return view('cuenta.index', $data);

   }

   public function update(StoreForm $request, $id){

        //Obtengo el usuario
        $usuario = User::findOrFail($id);

        //Busco la persona
        $persona =  Persona::findOrFail($usuario->id_persona);
      
        //Actualizo los datos de la persona
        $persona->nombres = $request->nombres_cuenta;
        $persona->apellidos = $request->apellidos_cuenta;
        $persona->id_opcion_tipo_documento = $request->tipo_documento;
        $persona->numero_documento = $request->numero_documento;
        $persona->id_opcion_genero = $request->tipo_genero;
        $persona->natalicio = $request->fecha_nacimiento;
        $persona->update();
       
        //Actualizo el email de la tabla usuarios
        $usuario->email = $request->email_cuenta;
        $usuario->update();

        return redirect()->route('micuenta.index')->with('message', 'Registro editado con éxito.')->with('typealert', 'success');
   }


   public function changePassword(Request $request, $id){

        $usuario = User::findOrFail($id);

        if (Auth::attempt([
            'email' => $usuario->email,
            'password' => $request->input('contraseniaactual')
        ], true)) :
            $contraseña_nueva = $request->input('contrasenianueva');
            $confirmacion_contraseña = $request->input('confirmacioncontrasenia');
            if($contraseña_nueva === $confirmacion_contraseña){
                $usuario->password = Hash::make($request->input('contrasenianueva'));
                $usuario->update();
                return redirect()->route('micuenta.index')->with('editado', 'ok');
            }else{
                return redirect()->route('micuenta.index')->with('errorConfirmacionContraseñas', 'ok');
            }
        else :
            return redirect()->route('micuenta.index')->with('errorContraseñaActual', 'ok');
        endif;
   }

   public function destroy($id){
        $persona_contacto = Persona_contacto::findOrFail($id);
        $persona_contacto->delete();
        return redirect()->route('micuenta.index')->with('eliminado', 'ok');
   }

   public function datosContacto(Request $request, $id){

    $usuario = User::findOrFail($id);

    $persona_contacto = new Persona_contacto();
    $persona_contacto->id_persona = $usuario->id_persona;
    $persona_contacto->id_opcion_contacto = $request->tipocontacto;
    $persona_contacto->valor = $request->contacto;
    $persona_contacto->id_barrio = $request->barrio;

    $persona_contacto->save();

    return redirect()->route('micuenta.index')->with('guardado', 'ok');

   }

   public function getPersonaContactoById(Request $request){
        $personacontacto = Persona_contacto::findOrFail($request->id);

        $barrio =  null;
        if($personacontacto->id_barrio != null){
            $barrio = Barrio::findOrFail($personacontacto->id_barrio);
        }

        return response()->json(
            [
                'personacontacto' => $personacontacto,
                'municipio' => $barrio != null ? $barrio->id_municipio : null,
                'success' => true
            ]
        );
   }


   public function updatePersonaContacto(Request $request){
        $personacontacto = Persona_contacto::findOrFail($request->hiddenidpersonacontacto);
        $personacontacto->id_opcion_contacto = $request->tipoContactoEditar;
        $personacontacto->valor = $request->contactoEditar;
        $personacontacto->id_barrio = $request->barrioEditar;

        $personacontacto->update();

        return redirect()->route('micuenta.index')->with('editado', 'ok');

   }

   public function show(){}


}
