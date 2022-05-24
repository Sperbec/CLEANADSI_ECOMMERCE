<?php

namespace App\Http\Controllers;

use App\Models\Detalle_orden_compra;
use App\Models\Orden_compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use PDF;


class OrdenCompraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
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
        $orden_compra->total = $request->total;
        $orden_compra->valor_iva = $request->valor_iva;
        $orden_compra->subtotal = $request->subtotal;
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

        $sqlOrdenesCompra = 'SELECT id_orden, codigo, fecha,
        case when nombres is not null then
        concat(nombres, " ", apellidos)  else
        proveedores.nombre end as nombre_proveedor,subtotal, valor_iva, total
        from orden_compras 
        inner join proveedores on proveedores.id_proveedor = orden_compras.id_proveedor 
        left join personas on personas.id_persona = proveedores.id_persona';

        $ordenes = DB::select($sqlOrdenesCompra);

        $data = ['ordenes' => $ordenes];

        return view('ordencompra.index', $data);
    }

    public function verOrdenCompra($id){

        $sql1 = 'SELECT id_orden, codigo, fecha,
        case when nombres is not null then
        concat(nombres, " ", apellidos)  else
        proveedores.nombre end as nombre_proveedor,subtotal, valor_iva, total, comentario
        from orden_compras 
        inner join proveedores on proveedores.id_proveedor = orden_compras.id_proveedor 
        left join personas on personas.id_persona = proveedores.id_persona
        where orden_compras.id_orden = '.$id;

        $sql2 = 'SELECT id_detalle_orden,
        productos.nombre, productos.sku, detalle_orden_compra.cantidad, productos.precio
        from orden_compras 
        inner join detalle_orden_compra  on  detalle_orden_compra.id_orden = orden_compras.id_orden 
        inner join productos on productos.id_producto = detalle_orden_compra.id_producto
        where orden_compras.id_orden = '.$id;

        $encabezado=DB::select($sql1);
        $detalles = DB::select($sql2);

        $data = ['encabezado' => $encabezado[0],
        'detalles' => $detalles];

        return view('ordencompra.show', $data);

    }

    public function imprimirordencompra($id){

        $sql1 = 'SELECT id_orden, codigo, fecha,
        case when nombres is not null then
        concat(nombres, " ", apellidos)  else
        proveedores.nombre end as nombre_proveedor,subtotal, valor_iva, total, comentario
        from orden_compras 
        inner join proveedores on proveedores.id_proveedor = orden_compras.id_proveedor 
        left join personas on personas.id_persona = proveedores.id_persona
        where orden_compras.id_orden = '.$id;

        $sql2 = 'SELECT id_detalle_orden,
        productos.nombre, productos.sku, detalle_orden_compra.cantidad, productos.precio
        from orden_compras 
        inner join detalle_orden_compra  on  detalle_orden_compra.id_orden = orden_compras.id_orden 
        inner join productos on productos.id_producto = detalle_orden_compra.id_producto
        where orden_compras.id_orden = '.$id;

        $encabezado=DB::select($sql1);
        $detalles = DB::select($sql2);

        $pdf = PDF::loadView('ordencompra.pdf', [
            'encabezado' => $encabezado[0],
            'detalles' => $detalles
        ]);

        //Ver el pdf en el navegador
        return $pdf->stream();
    }
}
