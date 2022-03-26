<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'getLogout'])->name('getLogout');

//Rutas para registrarse
Route::get('/register', [App\Http\Controllers\LoginController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [App\Http\Controllers\LoginController::class, 'postRegister'])->name('postRegister');

//Rutas para recuperar contraseña
Route::get('/recover', [App\Http\Controllers\LoginController::class, 'getRecover'])->name('getRecover');
Route::post('/recover', [App\Http\Controllers\LoginController::class, 'postRecover'])->name('postRecover');
Route::get('/reset', [App\Http\Controllers\LoginController::class, 'getReset'])->name('getReset');
Route::post('/reset', [App\Http\Controllers\LoginController::class, 'postReset'])->name('postReset');

//Categorías
Route::resource('categoria', App\Http\Controllers\CategoriaController::class)->names('categoria');


//Proveedores
Route::get('/proveedores/index', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedores');
Route::get('/proveedores/crear', [App\Http\Controllers\ProveedorController::class, 'crear'])->name('crearProveedores');
Route::post('/proveedores/guardar', [App\Http\Controllers\ProveedorController::class, 'guardar'])->name('guardarProveedores');
Route::get('/proveedores/{id}/editar', [App\Http\Controllers\ProveedorController::class, 'editar'])->name('editarProveedores');
Route::post('/proveedores/{id}/editarProveedor', [App\Http\Controllers\ProveedorController::class, 'editarProveedor'])->name('editarProveedor');
Route::get('/proveedores/{id}/eliminar', [App\Http\Controllers\ProveedorController::class, 'eliminar'])->name('eliminarProveedores');


//Clientes
Route::get('/cliente/index', [App\Http\Controllers\UsuarioController::class, 'index'])->name('clientes');
Route::get('/cliente/crear', [App\Http\Controllers\UsuarioController::class, 'crear'])->name('crearClientes');
Route::post('/cliente/guardar', [App\Http\Controllers\UsuarioController::class, 'guardar'])->name('guardarClientes');
Route::get('/cliente/{id}/editar', [App\Http\Controllers\UsuarioController::class, 'editar'])->name('editarClientes');
Route::post('/cliente/{id}/editarCliente', [App\Http\Controllers\UsuarioController::class, 'editarCliente'])->name('editarClientes');
Route::get('/cliente/{id}/eliminar', [App\Http\Controllers\UsuarioController::class, 'eliminar'])->name('eliminarClientes');


//Orden de compra
Route::get('/orden/crear', [App\Http\Controllers\OrdenCompraController::class, 'crear'])->name('crearOrdenCompra');
Route::get('/orden/consultar', [App\Http\Controllers\OrdenCompraController::class, 'consultar'])->name('consultarOrdenCompra');
