<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
class FrontendController extends Controller
{

    
    public function nuevos_productos()
    {
        $producto=Producto::orderBy('id_producto','desc')->paginate(5);
        
        return view('frontend.inicio',compact('producto'));
    }

    public function categoria_aseo_personal()
    {
        $producto_aseo_personal = Producto::where('id_categoria','3')->get();

        return view('frontend.aseo_personal',compact('producto_aseo_personal'));
    }

    public function categoria_aseo_general()
    {
        $producto_aseo_general = Producto::where('id_categoria','2')->get();

        return view('frontend.aseo_general',compact('producto_aseo_general'));
    }

    public function detalle(Producto $producto)
    {
        return view('frontend.detalle',compact('producto'));
    }

    public function crear()
    {
        return view('frontend.crear');
    }

    public function store(Request $request)
    {
        //$producto =Producto::create($request->all());

        $request->validate([
            'nombre'=> 'required',
            'descripcion' => 'required',
            'sku'=> 'required',
            'estado' => 'required',
            'precio' => 'required',
            'cantidad_existencia'=> 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'id_categoria'=> 'required',
        ]);
       //dd('ok');
        
        $salidaimagen =$request->all();

        if($imagen=$request->file('imagen'))
        {
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis'). "." .$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $salidaimagen['imagen'] = "$imagenProducto";
        }

        Producto::create($salidaimagen);
        
        return redirect()->route('frontend.aseo_personal');
    }

}