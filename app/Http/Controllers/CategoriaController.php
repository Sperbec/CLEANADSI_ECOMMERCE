<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreForm;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index(){

        $sql = 'SELECT roles.id 
        FROM usuarios
        inner join model_has_roles mhr on mhr.model_id = usuarios.id_usuario 
        inner join roles on roles.id = mhr.role_id 
        where id_usuario = ' . auth()->user()->id_usuario;

        $rol = DB::select($sql);

        if ($rol[0]->id == 2) {
            return redirect('/');
        }
        
        $categorias = Categoria::All();
        $data = ['categorias' => $categorias];
        return view('categoria.index', $data);
    }

    public function store(StoreForm $request){
        
        $categoria = new Categoria();
        $categoria->codigo =  $request->codigo_categoria;
        $categoria->nombre =  $request->nombre_categoria;
       
        $categoria->save();
        
        return redirect()->route('categoria.index')->with('guardado', 'ok');
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        $data = ['categoria' => $categoria];
        return view('categoria.edit', $data);

    }

    public function update(StoreForm $request, $id){
      
        $categoria = Categoria::findOrFail($id);
        $categoria->codigo =  $request->codigo_categoria;
        $categoria->nombre =  $request->nombre_categoria;
       
        $categoria->update();
        
        return redirect()->route('categoria.index')->with('editado', 'ok');
    }

    public function destroy($id){

        //Si la categoria está relacionada a un producto no se puede eliminar.
        $sql = 'SELECT  id_producto from productos
        where id_categoria = '.$id;
        
        $productos_relacionados = DB::select($sql);

        if(empty($productos_relacionados)){
           
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            return redirect()->route('categoria.index')->with('eliminado', 'ok');
        }else{
            return redirect()->route('categoria.index')->with('error', 'ok');
        }

    }

}
