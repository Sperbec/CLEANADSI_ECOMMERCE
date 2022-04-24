<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index(){
        $categorias = Categoria::All();
        $data = ['categorias' => $categorias];
        return view('categoria.index', $data);
    }

    public function create(){
       
    }

    public function store(Request $request){
        
        $codigocategoria = $request->codigo;
        $nombrecategoria = $request->nombre;
        
        $categoria = new Categoria();
        $categoria->codigo = $codigocategoria;
        $categoria->nombre = $nombrecategoria;

        $categoria->save();

        return redirect()->route('categoria.index')->with('guardado', 'ok');
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        $data = ['categoria' => $categoria];
        return view('categoria.edit', $data);

    }

    public function update(Request $request, $id){
        $codigocategoria = $request->codigo;
        $nombrecategoria = $request->nombre;

        $categoria = Categoria::findOrFail($id);
        $categoria->codigo = $codigocategoria;
        $categoria->nombre = $nombrecategoria;
        
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

    public function show(){
    }
}
