<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    
    public function index(){
        $categorias = Categoria::all();
       
        
         //Consulto los datos de la persona que está logueada
        $sql = 'SELECT id_usuario, nombres,apellidos, email,
        id_opcion_tipo_documento, numero_documento,
        id_opcion_genero, natalicio,
        documento.nombre as tipodocumento, genero.nombre as tipogenero
        from usuarios
        inner join personas on personas.id_persona = usuarios.id_persona
        inner join opciones_definidas documento on documento.id_opcion =personas.id_opcion_tipo_documento
        inner join opciones_definidas genero on genero.id_opcion = personas.id_opcion_genero
        where id_usuario = '.auth()->user()->id_usuario;

        $usuario = DB::select($sql);


        $data = ['categorias' => $categorias,
            'usuario' => $usuario[0]];

        return view('pedidos.index', $data);
    }
}
