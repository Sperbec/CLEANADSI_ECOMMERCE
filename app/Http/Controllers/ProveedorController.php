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

    public function index()
    {

        $sql = 'SELECT id_proveedor, 
        case when nit is not null then nit else numero_documento end as documento,
        case when nombres is not null then 
        concat(nombres, " ", apellidos)  else 
        proveedores.nombre end as nombre,
        opciones_definidas.nombre as tipopersona
        from proveedores 
        left join personas on personas.id_persona = proveedores.id_persona
        inner join opciones_definidas on opciones_definidas.id_opcion = proveedores.id_opcion_persona';

        $proveedores = DB::select($sql);
        $data = ['proveedores' => $proveedores];

        return view('proveedor.index', $data);
    }

    public function show($id_proveedor)
    {
        $sql = 'SELECT id_proveedor, id_opcion_persona,
        case when nit is not null then nit else numero_documento end as documento,
        case when nombres is not null then 
     	nombres  else 
        proveedores.nombre end as nombres,
        case when apellidos is not null then apellidos end as apellidos,
        opciones_definidas.nombre as tipopersona,
        personas.natalicio,
        personas.id_opcion_genero,
        personas.id_opcion_tipo_documento,
        proveedores.direccion,
        proveedores.correo_electronico,
        proveedores.contacto,
        proveedores.telefono_movil
        from proveedores 
        left join personas on personas.id_persona = proveedores.id_persona
        inner join opciones_definidas on opciones_definidas.id_opcion = proveedores.id_opcion_persona
        WHERE id_proveedor = '.$id_proveedor;


        $proveedor = DB::select($sql);
        
        $tipos_personas = Opciones_definidas::where('variable', '00tipopersona')->get();
        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();

        $data = ['proveedor' => $proveedor[0],
                'tipos_personas' => $tipos_personas,
                'tipos_documentos' => $tipos_documentos,
                'generos' => $generos
        ];

        return view('proveedor.show', $data);
        
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
        return view('proveedor.create', $data);
    }

    public function store(Request $request)
    {
        $tipos_personas = $request->tipos_personas;
       

        // Datos persona natural para el if de persona natural
        if ($tipos_personas == 20) {
            
            $persona = new Persona();

            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->id_opcion_genero = $request->genero;
            $persona->id_opcion_tipo_documento = $request->tipo_documento;
            $persona->numero_documento = $request->numero_documento;
            $persona->natalicio = $request->calendario;
            $persona->habilitado = 1;

            $persona->save();

            $proveedor = new Proveedor();
            $proveedor->id_persona = $persona->id_persona;
            $proveedor->id_opcion_persona = $tipos_personas;
            $proveedor->save();
        }

        // Datos persona juridica para el if de persona jurídia
        if ($tipos_personas == 21) {
            $proveedor = new Proveedor();
            $proveedor->id_opcion_persona = $tipos_personas;
            $proveedor->nombre = $request->nombre;
            $proveedor->nit =  $request->nit;
            $proveedor->direccion = $request->direccion;
            $proveedor->correo_electronico = $request->correo;
            $proveedor->contacto = $request->contacto;
            $proveedor->telefono_movil = $request->telefono_movil;
            $proveedor->save();
        }

        return redirect()->route('proveedores.index')->with('guardado', 'ok');
    }

    public function edit($id_proveedor)
    {

        $sql = 'SELECT id_proveedor, id_opcion_persona,
        case when nit is not null then nit else numero_documento end as documento,
        case when nombres is not null then 
     	nombres  else 
        proveedores.nombre end as nombres,
        case when apellidos is not null then apellidos end as apellidos,
        opciones_definidas.nombre as tipopersona,
        personas.natalicio,
        personas.id_opcion_genero,
        personas.id_opcion_tipo_documento,
        proveedores.direccion,
        proveedores.correo_electronico,
        proveedores.contacto,
        proveedores.telefono_movil
        from proveedores 
        left join personas on personas.id_persona = proveedores.id_persona
        inner join opciones_definidas on opciones_definidas.id_opcion = proveedores.id_opcion_persona
        WHERE id_proveedor = '.$id_proveedor;


        $proveedor = DB::select($sql);
        
        $tipos_personas = Opciones_definidas::where('variable', '00tipopersona')->get();
        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();

        $data = ['proveedor' => $proveedor[0],
                'tipos_personas' => $tipos_personas,
                'tipos_documentos' => $tipos_documentos,
                'generos' => $generos
        ];

        return view('proveedor.edit', $data);
    }

    public function update(Request $request, $id_proveedor)
    {

        $proveedor = Proveedor::find($id_proveedor);

        if ($proveedor->id_opcion_persona == 20) {
            $persona = Persona::find($proveedor->id_persona);

            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->id_opcion_genero = $request->genero;
            $persona->id_opcion_tipo_documento = $request->tipo_documento;
            $persona->numero_documento = $request->numero_documento;
            $persona->natalicio = $request->calendario;
            $persona->habilitado = 1;

            $persona->update();
        }

        if ($proveedor->id_opcion_persona  == 21) {           
            $proveedor->nombre = $request->nombre;
            $proveedor->nit =  $request->nit;
            $proveedor->direccion = $request->direccion;
            $proveedor->correo_electronico = $request->correo;
            $proveedor->contacto = $request->contacto;
            $proveedor->telefono_movil = $request->telefono_movil;
            $proveedor->update();
        }

        return redirect()->route('proveedores.index')->with('editado', 'ok');;
    }

    public function destroy($id_proveedor)
    {
        $proveedor = Proveedor::findOrFail($id_proveedor);
        $persona = Persona::find($proveedor->id_persona);

        $proveedor->delete();
        $persona->delete();
        

        return redirect()->route('proveedores.index')->with('eliminado', 'ok');;
    }
}
