<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenCompraController extends Controller
{
    public function crear(){

        $sqlProveedores = 'SELECT id_proveedor, 
                case when nombres is not null then 
                concat(nombres, " ", apellidos)  else 
                nombre end as proveedor 
                from proveedores 
                left join personas on personas.id_persona = proveedores.id_persona';

        $sqlProductos = 'SELECT id_producto, nombre FROM productos WHERE estado = 1 ';

        
                
        $proveedores = DB::select($sqlProveedores);
        $productos = DB::select($sqlProductos);

        $data = ['proveedores' => $proveedores,
                'productos' => $productos];
        return view('ordencompra.crear', $data);
    }

    public function consultar(){
        return view('ordencompra.consultar');
    }
}
