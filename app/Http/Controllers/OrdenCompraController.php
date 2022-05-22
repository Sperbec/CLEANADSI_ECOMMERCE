<?php

namespace App\Http\Controllers;

use App\Models\Detalle_orden_compra;
use App\Models\Orden_compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;


class OrdenCompraController extends Controller
{
    public function crear(){

        $sqlProveedores = 'SELECT id_proveedor,
                case when nombres is not null then
                concat(nombres, " ", apellidos)  else
                nombre end as proveedor
                from proveedores
                left join personas on personas.id_persona = proveedores.id_persona
                WHERE proveedores.deleted_at is null';

        $sqlProductos = 'SELECT id_producto, nombre FROM productos WHERE estado = 1 ';

        $proveedores = DB::select($sqlProveedores);
        $productos = DB::select($sqlProductos);

        $data = ['proveedores' => $proveedores,
                'productos' => $productos];
        return view('ordencompra.create', $data);
    }

    public function guardarOrdenCompra(Request $request){

        $orden_compra = new  Orden_compra();
        $orden_compra->codigo = 'ORD001';
        $dt = new DateTime();
        $orden_compra->fecha = $dt->format('Y-m-d H:i:s');
        $orden_compra->id_proveedor = $request->proveedores;
        $orden_compra->total = 50000;
        $orden_compra->valor_iva = 50000;
        $orden_compra->subtotal = 50000;
        $orden_compra->comentario = 'comentario';
        $orden_compra->estado = 1;

        $orden_compra->save();
        
        for ($i=1; $i <= $request->contador; $i++) { 
            $detalle_orden_compra = new  Detalle_orden_compra();
            $detalle_orden_compra->id_orden = $orden_compra->id_orden;

            $letrasidproducto = "idproductotbl".strval($i);
            $detalle_orden_compra->id_producto = $request->$letrasidproducto;

            $letrascantidad = "cantidadproductotbl".strval($i);
            $detalle_orden_compra->cantidad = $request-> $letrascantidad;

            $detalle_orden_compra->save();
        }

        return redirect()->route('crearOrdenCompra')->with('guardado', 'ok' );

    }

    public function consultar(){
        return view('ordencompra.index');
    }
}
