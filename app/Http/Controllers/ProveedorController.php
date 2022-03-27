<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Opciones_definidas;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $sql = 'SELECT id_proveedor, 
        case when nit is not null then nit else numero_documento end as documento,
        case when nombres is not null then 
        concat(nombres, " ", apellidos)  else 
        nombre end as nombre 
        from proveedores 
        left join personas on personas.id_persona = proveedores.id_persona';
        
        $proveedores = DB::select($sql);
        $data = ['proveedores' => $proveedores];
        return view('proveedor.index', $data);
    }

    public function show($id){
        $proveedor = Proveedor::find($id);
        return view('proveedor.index', compact('proveedor'));
    }

    public function create(){
        $tipos_personas = Opciones_definidas::where('variable', '00tipopersona')->get();
        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();
        
    


        $data = ['tipos_personas' => $tipos_personas,
                'tipos_documentos' =>$tipos_documentos,
                'generos' => $generos];
        return view('proveedor.crear', $data);
    }

    public function store(Request $request){


        
       // Datos persona natural para el if de persona natural
        $tipos_personas = $request->tipos_personas;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $tipos_documento = $request->tipo_documento;
        $documento = $request->numero_documento;
        $genero = $request->genero;
        $caledario = $request->calendario;

        // Datos persona juridica para el if de persona jurídia

        $nombre_juridico = $request->nombre;
        $nit = $request->nit;
        $direccion = $request->direccion;
        $correo = $request->correo;
        $contacto = $request->contacto;
        $telefono_movil = $request->telefono_movil;
        

        if ($tipos_personas == 20) {
            $persona = new Persona();

            $persona->nombres = $nombres;
            $persona->apellidos = $apellidos;
            $persona->id_opcion_genero = $genero;
            $persona->id_opcion_tipo_documento = $tipos_documento;
            $persona->numero_documento = $documento;
            $persona->natalicio = $caledario;
            $persona->habilitado = 1;

            $persona->save();
        }

        if ($tipos_personas == 21) {
            $proveedor = new Proveedor();
            $proveedor->id_opcion_persona = $tipos_personas;
            $proveedor->nombre = $nombre_juridico;
            $proveedor->nit = $nit;
            $proveedor->direccion = $direccion;
            $proveedor->correo_electronico = $correo;
            $proveedor->contacto = $contacto;
            $proveedor ->telefono_movil=$telefono_movil;

            $proveedor->save();
        }

        return redirect()->route('proveedores.index');
    }

    public function edit($id_proveedor){
        
        $proveedor = Proveedor::FindOrFail($id_proveedor);
        
        return view('proveedor.editar', compact('proveedor'));
        dd($id_proveedor);
    }

    public function update(Request $request, $id_proveedor){
        
       
        $nombreproveedor = $request->nombreproveedor;
        
        $proveedor = Proveedor::find($id_proveedor);
       
        $proveedor->nombre = $nombreproveedor;
        
        $proveedor->update();

        return redirect()->route('proveedores.index');
    }

    public function destroy($id_proveedor){
        $proveedor = Proveedor::findOrFail($id_proveedor);
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}
