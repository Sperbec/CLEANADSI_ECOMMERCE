<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetalleFactura;

use App\Models\Producto;
use App\Models\Facturas;
use App\Models\Opciones_definidas;
use App\Models\Categoria;

class FrontendController extends Controller
{
//BORRAR PRUEBA

/* public function __construct()
{
    $this->middleware('auth');
} */

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
        $categorias = Categoria::all();
        return view('frontend.crear',compact('categorias'));
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
            $imagenProducto = $request->nombre."." . date('YmdHis'). "." .$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $salidaimagen['imagen'] = "$imagenProducto";
        }

        Producto::create($salidaimagen);
        
        return redirect()->route('inicio');
    }

    //carrito de Compras
     /**
     * Write code on Method
     *
     * @return response()
     */
     public function carrito()
    {
        $categorias = Categoria::all();

        $carrito = session()->get('carrito');
        
        return view('frontend.carrito',compact('carrito','categorias'));
    } 
  
    /**
     * Write code on Method
     *
     * @return response()
     */
     public function añadir_carrito($id)
    {
        $producto = Producto::findOrFail($id);
        $carrito = session()->get('carrito', []);
        //si el carrito tiene un producto con el mismo id
        if(isset($carrito[$id])) {
            $carrito[$id]['quantity']++;
        } else {
            $carrito[$id] = [
                "id" => $producto->id_producto,
                "nombre" => $producto->nombre,
                "quantity" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen,
                "descripcion" => $producto->descripcion,
                "sku" => $producto->sku,
                "estado" => $producto->estado,
                "cantidad_existencia" => $producto->cantidad_existencia,
                "id_categoria" => $producto->id_categoria
                
            ];
        }
        session()->put('carrito', $carrito);
        
        return redirect()->back()->with('success', 'Producto Añadido al carrito!');
    } 
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $carrito = session()->get('carrito');
            $carrito[$request->id]["quantity"] = $request->quantity;
            session()->put('carrito', $carrito);
            session()->flash('success', 'Carrito actualizado');
        }
        //return redirect()->route('carrito');
    }   
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function eliminar(Request $request)
    {
        if($request->id) {
            $carrito = session()->get('carrito');
            if(isset($carrito[$request->id])) {
                unset($carrito[$request->id]);
                session()->put('carrito', $carrito);
            }
            session()->flash('success', 'Producto eliminado');
        } return redirect()->route('carrito')->with('success', 'Producto eliminado del carrito!');
    }

    public function detalle_compra(Request $request)
    {
        
        $categorias = Categoria::all();

        $detalle_factura = DetalleFactura::all();
        $comentario_facturas = Facturas::all();
        $opcion_entregas = Opciones_definidas::where('variable', '00tipoentrega')->get();
        $opcion_pagos = Opciones_definidas::where('variable', '00tipopago')->get();
        $carrito = session()->get('carrito');
        session()->put('carrito', $carrito);
       return view('facturas/detalle',compact('opcion_entregas','opcion_pagos','comentario_facturas','categorias','detalle_factura'));
    }  


    public function preguntasfrecuentes(){
        $categorias = Categoria::all();
        $data = ['categorias' => $categorias];
        return view('frontend.preguntas_frecuentes', $data);
    }

    public function sobrenosotros(){
        $categorias = Categoria::all();
        $data = ['categorias' => $categorias];
        return view('frontend.sobre_nosotros', $data);
    }

    public function politicasprivacidad(){
        $categorias = Categoria::all();
        $data = ['categorias' => $categorias];
        return view('frontend.politicas_privacidad', $data);
    }
    
    
}   