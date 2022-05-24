<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Facturas;
use App\Models\DetalleFactura;
use App\Models\Persona_contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class FacturaController extends Controller
{
    public function factura(Request $request)
    { 
        /* $factura =new Facturas();

        $factura->comentario =$request->comentario;
        $factura->codigo =$request->codigo;

        $factura ->save();

        $carrito = session()->get('carrito');
        session()->put('carrito', $carrito);

        
        foreach($carrito as $d){
            dd($id_producto = $d['nombre']);
            $id_factura = $factura->id;
            $cantidad =$d['quantity'];

            $re = DetalleFactura::detalle_factura(null,$id_producto,$cantidad);
            dd($id_producto);
        }
        return view('frontend.inicio');
         */
        
       
        

        
        
         /* return view('facturas.facturas');     */
      
    }

    public function crear_factura(Request $request)
    {

        
        
        $carrito = session()->get('carrito');
        session()->put('carrito', $carrito);
        
        /* if (Auth::check()) {
            // The user is logged in...
        }else {
            "no puede acceder";
        } */
        
        
     
        $persona = Persona_contacto::all();
        $factura =new Facturas();

        
        if (isset( $factura->codigo )) {
            $factura->codigo = 1;

        }else {
            $factura->codigo +=1/*  $factura->codigo +1 */;
        }
        /* dd($factura->codigo); */
        $factura->fecha = date("YmdHis");

        $factura->id_persona = 1;/* $persona->id_persona; */
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
            DB::table('detalle_factura')->insert([
                'id_factura' => $factura->id_factura,
                'id_producto' => $d['id'],
                'cantidad' => $d['quantity']
            ]);
            }  

        session()->flush('carrito', $carrito);

        return redirect()->route('inicio');
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
        subtotal, valor_iva, costo_envio, total
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
        subtotal, valor_iva, costo_envio, total
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