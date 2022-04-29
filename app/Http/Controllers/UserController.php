<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   
    public function index()
    {
      
        $sql = 'SELECT id_usuario, nombres, apellidos, email from 
        usuarios inner join personas on personas.id_persona = usuarios.id_persona';

        $usuarios =DB::select($sql);
        $data = ['usuarios' => $usuarios];
        return view('users.index', $data);
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id_usuario)
    {
        $roles = Role::all();
        $sql = 'SELECT id_usuario, nombres, apellidos, email from 
        usuarios inner join personas on personas.id_persona = usuarios.id_persona 
        where id_usuario = '.$id_usuario;

        $usuario =DB::select($sql);
        $data = ['usuario' => $usuario[0],
                'roles' => $roles];
        return view('users.edit', $data);
    }

 
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index', $user)->with('guardado', 'ok');
    }

    
    public function destroy($id)
    {
        //
    }
}
