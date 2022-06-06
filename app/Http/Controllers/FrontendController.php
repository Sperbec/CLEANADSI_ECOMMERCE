<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetalleFactura;
use App\Models\User;
use App\Models\Producto;
use App\Models\Facturas;
use App\Models\Opciones_definidas;
use App\Models\Categoria;

use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    protected $usuario = null;
    protected $categorias;

    public function consultar_categorias(){
        $this->categorias = Categoria::all();
    }

    public  function consultarUsuario()
    {
        if (auth()->user() != null) {
             //Consulto los datos de la persona que está logueada
             $sql = 'SELECT id_usuario, nombres,apellidos , email,
             id_opcion_tipo_documento, numero_documento,
             id_opcion_genero, natalicio,
             documento.nombre as tipodocumento, genero.nombre as tipogenero
             from usuarios
             inner join personas on personas.id_persona = usuarios.id_persona
             inner join opciones_definidas documento on documento.id_opcion =personas.id_opcion_tipo_documento
             inner join opciones_definidas genero on genero.id_opcion = personas.id_opcion_genero
             where id_usuario = '.auth()->user()->id_usuario;

             $this->usuario = DB::select($sql);
        }
    }

    public function nuevos_productos()
    {

        $this->consultar_categorias();

        $producto=Producto::orderBy('id_producto','desc')->paginate(5);

        $this->consultarUsuario();

        if ($this->usuario != null) {
            $data = ['categorias' => $this->categorias,
            'producto'=>$producto, 'usuario' => $this->usuario != null ? $this->usuario[0] : null];

        }else{
            $data = ['categorias' => $this->categorias,
            'producto'=>$producto];
        }

        return view('frontend.inicio',$data);

    }

    public function categorias_front($id)
    {
        $this->consultar_categorias();
        $this->consultarUsuario();

        $categoria_seleccionada = Producto::where('id_categoria', $id)->paginate(12);

        $data = ['categoria_seleccionada' => $categoria_seleccionada,
                'categorias' => $this->categorias,
                'usuario' => $this->usuario != null ? $this->usuario[0] : null ];

        return view('frontend.categorias_front', $data);
    }



    public function detalle(Producto $producto)
    {
        $this->consultar_categorias();
        $this->consultarUsuario();

        $data = ['producto' => $producto,
        'categorias' => $this->categorias,
        'usuario' => $this->usuario != null ? $this->usuario[0] : null ];

        return view('frontend.detalle',$data);
    }

    public function crear()
    {
        $this->consultar_categorias();
        $data = ['categorias' => $this->categorias ];
        return view('frontend.crear',compact('categorias'));
    }

    public function store(Request $request)
    {

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


     public function carrito()
    {
        $this->consultar_categorias();
        $this->consultarUsuario();
        $carrito = session()->get('carrito');

        $data = ['carrito' => $carrito,
        'categorias' => $this->categorias,
        'usuario' => $this->usuario != null ? $this->usuario[0] : null];

        return view('frontend.carrito',$data);
    }


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

        return redirect()->back()->with('success', 'Producto añadido al carrito.');
    }

    public function update(Request $request)
    {

        if($request->id && $request->quantity){
            $carrito = session()->get('carrito');
            if($request->quantity < 0)
            {
                $carrito[$request->id]["quantity"] =1;
                session()->put('carrito', $carrito);
                session()->flash('success', 'Ingrese números positivos. Carrito actualizado');
            }else {

                $producto = Producto::findOrFail($request->id);
                if($producto->cantidad_existencia < $request->quantity){
                    $carrito[$request->id]["quantity"] =1;
                    session()->put('carrito', $carrito);
                    session()->flash('success', 'La cantidad solicitada es superior a la existente. Carrito actualizado');
                }else{
                    $carrito[$request->id]["quantity"] = $request->quantity;
                    session()->put('carrito', $carrito);
                    session()->flash('success', 'Carrito actualizado');
                }
            }

        }
    }


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

        $this->consultar_categorias();
        $this->consultarUsuario();

        $carrito = session()->get('carrito');
        session()->put('carrito', $carrito);


        $data = ['opcion_entregas' => Opciones_definidas::where('variable', '00tipoentrega')->get(),
                'opcion_pagos' => Opciones_definidas::where('variable', '00tipopago')->get(),
                'comentario_facturas' => Facturas::all(),
                'categorias' => $this->categorias,
                'detalle_factura' => DetalleFactura::all(),
                'usuario' =>$this->usuario != null ? $this->usuario[0] : null];

       return view('facturas/detalle', $data);
    }


    public function preguntasfrecuentes(){
        $this->consultar_categorias();
        $this->consultarUsuario();
        $data = ['categorias' => $this->categorias,
                'usuario' =>  $this->usuario != null ? $this->usuario[0] : null];
        return view('frontend.preguntas_frecuentes', $data);
    }

    public function sobrenosotros(){
        $this->consultar_categorias();
        $this->consultarUsuario();
        $data = ['categorias' => $this->categorias,
                'usuario' => $this->usuario != null ? $this->usuario[0] : null];
        return view('frontend.sobre_nosotros', $data);
    }

    public function politicasprivacidad(){
        $this->consultar_categorias();
        $this->consultarUsuario();
        $data = ['categorias' => $this->categorias,
                'usuario' =>  $this->usuario != null ? $this->usuario[0] : null];
        return view('frontend.politicas_privacidad', $data);
    }


}
