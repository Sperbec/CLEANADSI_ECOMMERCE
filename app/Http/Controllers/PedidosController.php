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
        $sql = 'select codigo, fecha, total, estado from facturas where id_persona = '.$usuario->id_persona;
        $pedidos = DB::select($sql);


        $data = ['categorias' => $this->categorias,
            'pedidos' => $pedidos,
            'usuario' => $this->usuario != null ? $this->usuario[0] : null];

        return view('pedidos.index', $data);
    }
}
