<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;


class ProductoController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function obtenerproducto(Request $request){

        $producto = Producto::findOrFail($request->texto);
        return response()->json(
            [
                'producto' => $producto,
                'success' => true
            ]
        );
    
    }
}
