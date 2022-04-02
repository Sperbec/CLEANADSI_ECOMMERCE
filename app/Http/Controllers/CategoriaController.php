<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    public function index(){
        $categorias = Categoria::All();
        $data = ['categorias' => $categorias];
        return view('categoria.index', $data);
    }

    public function create(){
        return view('categoria.crear');
    }

    public function store(Request $request){
        
        $codigocategoria = $request->codigo;
        $nombrecategoria = $request->nombre;
        
        $categoria = new Categoria();
        $categoria->codigo = $codigocategoria;
        $categoria->nombre = $nombrecategoria;

        $categoria->save();

        return redirect()->route('categoria.index');
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
        
        return redirect()->route('categoria.index');
    }

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoria.index');
    }

    public function show(){
    }
}
