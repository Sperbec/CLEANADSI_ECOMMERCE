<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Http\Requests\StoreForm;
use Illuminate\Http\Request;


class ProductoController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $productos = Producto::all();
        $data = ['productos' => $productos];
        return view('producto.index', $data);
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

    public function create(){
        $categorias= Categoria::all();
        $data = ['categorias' => $categorias];
        return view('producto.create', $data);
    }

    public function show($id_producto){

        $producto = Producto::findOrFail($id_producto);
        $categoria = Categoria::findOrFail($producto->id_categoria);

        $data = ['producto' => $producto,  
                'categoria' => $categoria];

        return view('producto.show', $data);
    }

    public function edit($id_producto){
        $producto = Producto::findOrFail($id_producto);
        $categorias= Categoria::all();

        $data = ['producto' => $producto,  
                'categorias' => $categorias];

        return view('producto.edit', $data);
    }

    public function destroy($id_producto){
        $producto  = Producto::find($id_producto);
        $producto->delete();
        return redirect()->route('productos.index')->with('eliminado', 'ok');
    }

    public function store(StoreForm $request){
        $producto = new Producto();
        $producto->nombre = $request->nombre_producto;
        $producto->descripcion = $request->descripcion_producto;
        $producto->sku = $request->sku;
        $producto->estado = 1;
        $producto->precio = $request->precio_producto;
        $producto->cantidad_existencia = $request->cantidad_existencia;

        if($request->file('imagen_producto') != null){
            $imagen = $request->file('imagen_producto');
            $nombre_imagen = time().'.'.$imagen->getClientOriginalExtension();
            $destino = public_path('/static/images/productos');
            $request->imagen_producto->move($destino, $nombre_imagen);
            $producto->imagen = $nombre_imagen;
        }

        
        $producto->id_categoria = $request->categoria;

        $producto->save();

        return redirect()->route('productos.index')->with('guardado', 'ok');
    }

    public function update(StoreForm $request, $id_producto){
        $producto  = Producto::find($id_producto);

        $producto->nombre = $request->nombre_producto;
        $producto->descripcion = $request->descripcion_producto;
        $producto->sku = $request->sku;
        $producto->estado = 1;
        $producto->precio = $request->precio_producto;
        $producto->cantidad_existencia = $request->cantidad_existencia;

       if($request->file('imagen_producto') != null){
            $imagen = $request->file('imagen_producto');
            $nombre_imagen = time().'.'.$imagen->getClientOriginalExtension();
            $destino = public_path('/static/images/productos');
            $request->imagen_producto->move($destino, $nombre_imagen);
            $producto->imagen = $nombre_imagen;
       }

        
        $producto->id_categoria = $request->categoria;

        $producto->update();

        return redirect()->route('productos.index')->with('editado', 'ok');
    }

 
}
