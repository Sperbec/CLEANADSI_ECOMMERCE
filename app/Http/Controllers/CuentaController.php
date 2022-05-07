<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function index(){
    $sql = 'SELECT id_usuario, nombres,apellidos , email,
    telefono.valor as numerotelefono,
    direccion.valor as direccion,
    municipios.nombre as ciudad,
    paises.nombre  as pais
    from usuarios 
    inner join personas on personas.id_persona = usuarios.id_persona 
    left join persona_contacto telefono on personas.id_persona = telefono.id_persona and telefono.id_opcion_contacto = 7
    left join persona_contacto direccion on personas.id_persona = direccion.id_persona and direccion.id_opcion_contacto = 10
    left join barrios on direccion.id_barrio = barrios.id_barrio 
    left join municipios on municipios.id_municipio = barrios.id_municipio 
    left join departamentos on departamentos.id_departamento = municipios.id_departamento 
    left join paises on paises.id_pais= departamentos.id_pais 
    where id_usuario = '.auth()->user()->id_usuario;

    $usuario = DB::select($sql);
    $data = ['usuario' => $usuario[0]];


    return view('cuenta.index', $data);

   }

   public function show($id){

   }

   public function create(){

   }

   public function store(Request $request){
   }

   public function edit($id){
   }

   public function update( Request $request, $id){
   }

   public function destroy($id){
   }
}
