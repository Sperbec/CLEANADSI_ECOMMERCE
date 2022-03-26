<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Opciones_definidas;
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

    public function mostrar($id){
        $proveedor = Proveedor::find($id);
        return view('proveedor.show', compact('proveedor'));
    }

    public function crear(){
        $tipos_personas = Opciones_definidas::where('variable', '00tipopersona')->get();
        $tipos_documentos = Opciones_definidas::where('variable', '00identificacion')->get();
        $generos = Opciones_definidas::where('variable', '00genero')->get();
        
    


        $data = ['tipos_personas' => $tipos_personas,
                'tipos_documentos' =>$tipos_documentos,
                'generos' => $generos];
        return view('proveedor.crear', $data);
    }

    public function guardar(Request $request){

       // Tipo persona para el if
        $tipos_personas = $request->tipos_personas;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $tipos_documento = $request->tipo_documento;
        $documento = $request->numero_documento;
        $documento = $request->numero_documento;
        dd($request);

        if ($tipos_personas == 20) {
            $proveedor = new Proveedor();
            $proveedor->nombre = $tipos_personas;

            $proveedor->save();
        }

        
        

        $proveedor->save();

        return redirect('/proveedores/index');
    }

    public function editar($id_proveedor){
        $proveedor = Proveedor::find($id_proveedor);
        return view('proveedor.editar', compact('proveedor'));
    }

    public function editarProveedor(Request $request, $id_proveedor){
        $codigoproveedor = $request->codigoproveedor;
        $nombreproveedor = $request->nombreproveedor;
        
        $proveedor = Proveedor::find($id_proveedor);
        $proveedor->codigo = $codigoproveedor;
        $proveedor->nombre = $nombreproveedor;
        
        $proveedor->update();

        return redirect('/proveedores/index');
    }

    public function eliminar($id_proveedor){
        $proveedor = Proveedor::find($id_proveedor);
        $proveedor->delete();
        return redirect('/proveedores/index');
    }
}
