<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Facturas;
use App\Models\Persona_contacto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

use function PHPUnit\Framework\isEmpty;

class FacturaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function crear_factura(Request $request)
    {

        $request->validate([
            'opcion_pagos'=> 'required',
            'opcion_entregas' => 'required',
        ]); 
       
        
        $carrito = session()->get('carrito');
        session()->put('carrito', $carrito);

        $sql = 'select id_factura  from facturas order by id_factura  desc limit 1';

        $id_factura = DB::select($sql);
        $factura =new Facturas();
        
        
        if (isEmpty($id_factura) && sizeof($id_factura) == 0) {
            $factura->codigo ="FV". 1;
        }else {
            $ultima_factura =Facturas::orderBy('id_factura','desc')->first();
            $factura->codigo = "FV".$ultima_factura->id_factura +1;
        }
        
        $factura->fecha = date("Y-m-d");

        $factura->id_persona = $request->user()->id_persona; 
        $total = 0;
        foreach($carrito as $d){
            $total += $d['precio'] * $d['quantity'];
        }

        $factura->subtotal =$total*0.81;

        $factura->valor_iva =$total*0.19;

        $factura->total =$total;

        $factura->id_opcion_tipo_entrega = $request->opcion_entregas;
        
        $factura->id_opcion_tipo_pago = $request->opcion_pagos; 

        $factura->comentario =$request->comentario;

        $factura->estado =1;
        
        
        $factura ->save(); 
        
        foreach($carrito as $d){

            //Resto a la cantidad en existencia lo que se compró
            $producto = Producto::findOrFail($d['id']);
            $producto->cantidad_existencia = $producto->cantidad_existencia - $d['quantity'];
            $producto->update();

            DB::table('detalle_factura')->insert([
                'id_factura' => $factura->id_factura,
                'id_producto' => $d['id'],
                'cantidad' => $d['quantity']
            ]);
        }  

        session()->flush('carrito', $carrito);

        return redirect()->route('inicio')->with('success', 'Su compra fue exitosa 🛒!');
       
    }


    public function index()
    {

        $sql = 'SELECT id_factura, codigo, fecha,
        concat(personas.nombres," ", personas.apellidos) as nombrecompleto,
        subtotal, valor_iva, costo_envio, total
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        where facturas.deleted_at is null';


        $facturas=DB::select($sql);
        $data = ['facturas' => $facturas];
        return view('factura.index', $data);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }

    public function show($id){

        $sql1 = 'SELECT id_factura, codigo, fecha,
        concat(personas.nombres," ", personas.apellidos) as nombrecompleto,
        subtotal, valor_iva, costo_envio, total,
        case when estado = 1 then "Pendiente por despachar"
   		when estado = 2 then "Despachado"
   		when estado = 3 then "Finalizado"
        when estado = 4 then "Anulado" end as estado
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        where facturas.id_factura = '.$id;


        $sql2 = 'SELECT facturas.id_factura, codigo,
        productos.nombre,  df.id_detalle_factura, df.cantidad, productos.precio,
        df.cantidad * productos.precio as subtotal,
        productos.sku
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        inner join detalle_factura df on df.id_factura  = facturas.id_factura
        inner join productos on productos.id_producto = df.id_producto
        where facturas.id_factura = '.$id;

        $encabezado=DB::select($sql1);
        $detalles = DB::select($sql2);


        $data = ['encabezado' => $encabezado[0],
                'detalles' => $detalles];

        return view('factura.show', $data);

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }

    public function imprimirfactura($id){

        $sql1 = 'SELECT id_factura, codigo, fecha,
        concat(personas.nombres," ", personas.apellidos) as nombrecompleto,
        subtotal, valor_iva, costo_envio, total,
        case when estado = 1 then "Pendiente por despachar"
   		when estado = 2 then "Despachado"
   		when estado = 3 then "Finalizado"
        when estado = 4 then "Anulado" end as estado
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        where facturas.id_factura = '.$id;


        $sql2 = 'SELECT facturas.id_factura, codigo,
        productos.nombre,  df.id_detalle_factura, df.cantidad, productos.precio,
        df.cantidad * productos.precio as subtotal,
        productos.sku
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        inner join detalle_factura df on df.id_factura  = facturas.id_factura
        inner join productos on productos.id_producto = df.id_producto
        where facturas.id_factura = '.$id;

        $encabezado=DB::select($sql1);
        $detalles = DB::select($sql2);

        $pdf = PDF::loadView('factura.pdf', [
            'encabezado' => $encabezado[0],
            'detalles' => $detalles
        ]);

        //Ver el pdf en el navegador
        return $pdf->stream();

        //Descargar el PDF
        //return $pdf->download('Factura.pdf');
    }
}