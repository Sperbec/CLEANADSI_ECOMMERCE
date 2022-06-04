<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{

    protected $usuario = null;
    protected $categorias;

    public function __construct(){
        $this->middleware('auth');
    }

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


    public function index(){
        $this->consultar_categorias();
        $this->consultarUsuario();

        $usuario = User::findOrFail(auth()->user()->id_usuario);
        $sql = 'select id_factura, codigo, fecha, total, estado from facturas where id_persona = '.$usuario->id_persona;
        $pedidos = DB::select($sql);


        $data = ['categorias' => $this->categorias,
            'pedidos' => $pedidos,
            'usuario' => $this->usuario != null ? $this->usuario[0] : null];

        return view('pedidos.index', $data);
    }

    public function show($id_factura){

        $this->consultar_categorias();
        $this->consultarUsuario();

        $sql1 = 'SELECT  codigo, fecha,subtotal,valor_iva, total,
        tipoentrega.nombre as tipoentrega,
        tipopago.nombre as tipopago,
        comentario,estado FROM facturas 
        inner join opciones_definidas tipoentrega on tipoentrega.id_opcion = facturas.id_opcion_tipo_entrega 
        inner join opciones_definidas tipopago on tipopago.id_opcion = facturas.id_opcion_tipo_pago
        where id_factura = '.$id_factura;

        $encabezado = DB::select($sql1);

        $sql2 = 'SELECT sku as codigo, nombre, cantidad, precio  as valorunitario
        from detalle_factura 
        inner join productos on productos.id_producto = detalle_factura.id_producto 
        where id_factura = '.$id_factura;

        $detalle = DB::select($sql2);

        
        $data = ['categorias' => $this->categorias,
            'encabezado' => $encabezado[0],
            'detalles' => $detalle,
            'usuario' => $this->usuario != null ? $this->usuario[0] : null];

        return view('pedidos.show', $data);
    }
}
