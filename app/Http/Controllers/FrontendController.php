<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;

class FrontendController extends Controller
{
//BORRAR PRUEBA
    public function prueba()
    {
        return view('frontend.prueba');
    }

    public function nuevos_productos()
    {
        $categorias = Categoria::all();
       

        $producto=Producto::orderBy('id_producto','desc')->paginate(5);
        $data = ['categorias' => $categorias,
        'producto'=>$producto];
        
        return view('frontend.inicio',$data);

    }

    public function categorias_front($id)
    {

        $categorias = Categoria::all();

        $categoria_seleccionada = Producto::where('id_categoria', $id)->paginate(12);
        //dd($categoria_seleccionada);
        return view('frontend.categorias_front', compact('categoria_seleccionada', 'categorias'));
    }

    /*public function categoria_aseo_general()
    {
        $producto_aseo_general = Producto::where('id_categoria','1')->paginate(12);

        return view('frontend.aseo_general',compact('producto_aseo_general'));
    }*/

    public function detalle(Producto $producto)
    {
        //dd($producto);
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
        
        return redirect()->route('inicio');
    }

}