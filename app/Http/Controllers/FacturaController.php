<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Facturas;
use App\Models\DetalleFactura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function factura(Request $request)
    { 
        $factura =new Facturas();

        $factura->comentario =$request->comentario;
        $factura->codigo =$request->codigo;

        $factura ->save();

        $carrito = session()->get('carrito');
        session()->put('carrito', $carrito);

        /* $factura = Facturas::create([
            "id_producto" =>$id_producto,
            "cantidad" =>$cantidad
        ]); */
        
        /* $id_factura = Facturas::factura(); */
        foreach($carrito as $d){
            dd($id_producto = $d['nombre']);
            $id_factura = $factura->id;
            $cantidad =$d['quantity'];

            $re = DetalleFactura::detalle_factura(null,$id_producto,$cantidad);
            dd($id_producto);
        }
        return view('frontend.inicio');
        
        
       
        

        
        
         /* return view('facturas.facturas');     */
      
    }

    public function crear_factura(Request $request)
    {

        $carrito = session()->get('carrito');
        session()->put('carrito', $carrito);

        $factura =new Facturas();

        
        if (isset($request->codigo)) {
            $factura->codigo =1;

        }else {
            $factura->codigo =$request->codigo + 1;
        }
        $factura->fecha = date("Y-m-d");

        $factura->id_persona =$request->id_persona;
        $total = 0;
        foreach($carrito as $d){

            /* $factura->id_producto = $d['id']; */

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

        return redirect()->route('factura');

        /* $factura = Facturas::create([
            "id_producto" =>$id_producto,
            "cantidad" =>$cantidad
        ]); */
        
        /* $id_factura = Facturas::factura(); */
        /* foreach($carrito as $d){
            dd($id_producto = $d['nombre']);
            $id_factura = $factura->id;
            $cantidad =$d['quantity'];

            $re = DetalleFactura::detalle_factura(null,$id_producto,$cantidad);
            dd($id_producto);
        } */
    }
}