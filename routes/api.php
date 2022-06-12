<?php

use App\Http\Resources\PersonaResource;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UsuarioResource;
use App\Models\User;
use App\Http\Resources\FacturaResource;
use App\Models\Factura;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Usuarios
Route::get('/usuarios/{id}', function ($id) {
    return new UsuarioResource(User::findOrFail($id));
});
Route::get('/usuarios/email/{email}', function ($email) {
    return new UsuarioResource(User::where('email', $email)->firstOrFail());
});

Route::get('/usuarios', function () {
    return UsuarioResource::collection(User::all());
});

// Personas
Route::get('/personas/{id}', function ($id) {
    return new PersonaResource(Persona::findOrFail($id));
});

Route::get('/personas', function () {
    return PersonaResource::collection(Persona::all());
});

// Facturas

Route::get('/facturas', function () {
    return FacturaResource::collection(Factura::all());
});

Route::get('/facturas/codigo/{codigo}', function ($codigo) {
    return new FacturaResource(Factura::where('codigo', $codigo)->firstOrFail());
});

Route::get('/facturas/fecha/{fecha_inicio}/{fecha_fin}', function ($fecha_inicio, $fecha_fin) {
    return FacturaResource::collection(Factura::whereBetween('fecha', [$fecha_inicio, $fecha_fin])->get());
});
