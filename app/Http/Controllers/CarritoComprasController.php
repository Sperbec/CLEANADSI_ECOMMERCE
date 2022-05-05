<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoComprasController extends Controller
{
    public function __construct()
    {
        //if(!$request->session()->has('carrito') \ $request->session()->put('carrito',array());
    }
    public function carrito(Producto $producto){
        //dd($producto);
        //return view('carritocompras.carrito');
    }

    public function Añadir(Request $request ,Producto $producto)
    {
        $carrito = $request->session()->get('carrito');
        $producto->quality =1;
        $carrito[$producto -> id_producto] = $producto;
        $request->session()->put('carrito', $carrito);
        //dd($carrito);
        return redirect()->route('carrito.index');
    }
    
    public function mostrar(Request $request)
    {
        $carrito = $request->session()->get('carrito');
        //$total = $this->total();
        dd($carrito);
        return view('carritocompras.carrito',compact('carrito'));
    }
}