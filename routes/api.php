<?php

use App\Http\Controllers\ImageController;
use App\Http\Resources\DetalleFacturaResource;
use App\Http\Resources\DetalleOrdenCompraResource;
use App\Http\Resources\OpcionDefinidaResource;
use App\Http\Resources\OrdenCompraResource;
use App\Http\Resources\PersonaResource;
use App\Http\Resources\ProductoResource;
use App\Models\Detalle_orden_compra;
use App\Models\DetalleFactura;
use App\Models\Opciones_definidas;
use App\Models\Orden_compra;
use App\Models\Persona;
use App\Models\Producto;
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

// Imagen

Route::get('/get-img', [ImageController::class, 'getImg'])->name('getImage');

// Productos

Route::get('/productos', function () {
    return ProductoResource::collection(Producto::all());
});

// Personas

Route::get('/personas', function () {
    return PersonaResource::collection(Persona::all());
});

// Usuarios
Route::get('/usuarios/id/{id}', function ($id) {
    return new UsuarioResource(User::findOrFail($id));
});
Route::get('/usuarios/email/{email}', function ($email) {
    return new UsuarioResource(User::where('email', $email)->firstOrFail());
});

Route::get('/usuarios', function () {
    return UsuarioResource::collection(User::all());
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

// Detalle Factura

Route::get('/detalle-facturas', function () {
    return DetalleFacturaResource::collection(DetalleFactura::all());
});

// Órdenes de Compra

Route::get('/ordenes', function () {
    return OrdenCompraResource::collection(Orden_compra::all());
});

// Detalle Órdenes de Compra

Route::get('/detalle-ordenes', function () {
    return DetalleOrdenCompraResource::collection(Detalle_orden_compra::all());
});

// Opciones Definidas

Route::get('/opciones-definidas', function () {
    return OpcionDefinidaResource::collection(Opciones_definidas::all());
});

Route::get('/opciones/id/{id}', function ($id) {
    return new OpcionDefinidaResource(OpcionDefinida::findOrFail($id));
});
