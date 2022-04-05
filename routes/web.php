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

//Rutas para autenticación
//Get es cuando se realiza una petición a traves de un navegador 
//Se pone @ y la función a la que debe ir 
Route::get('/login', [App\Http\Controllers\LoginController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'getLogout'])->name('getLogout');

Route::get('/register', [App\Http\Controllers\LoginController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [App\Http\Controllers\LoginController::class, 'postRegister'])->name('postRegister');

//Usuarios
Route::get('/usuarios/index', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios');
Route::get('/usuarios/{id}/show', [App\Http\Controllers\UsuarioController::class, 'mostrar'])->name('mostrarUsuarios');
Route::get('/usuarios/crear', [App\Http\Controllers\UsuarioController::class, 'crear'])->name('crearUsuarios');
Route::post('/usuarios/guardar', [App\Http\Controllers\UsuarioController::class, 'guardar'])->name('guardarUsuarios');
Route::get('/usuarios/{id}/editar', [App\Http\Controllers\UsuarioController::class, 'editar'])->name('editarUsuarios');
Route::post('/usuarios/{id}/editarUsuario', [App\Http\Controllers\UsuarioController::class, 'editarUsuario'])->name('editarUsuario');
Route::get('/usuarios/{id}/eliminar', [App\Http\Controllers\UsuarioController::class, 'eliminar'])->name('eliminarUsuarios');


//Categorías
Route::get('/categorias/index', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias');

//Proveedores
Route::get('/proveedores/index', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedores');
Route::get('/proveedores/{id}/show', [App\Http\Controllers\ProveedorController::class, 'mostrar'])->name('mostrarProveedores');
Route::get('/proveedores/crear', [App\Http\Controllers\ProveedorController::class, 'crear'])->name('crearProveedores');
Route::post('/proveedores/guardar', [App\Http\Controllers\ProveedorController::class, 'guardar'])->name('guardarProveedores');
Route::get('/proveedores/{id}/editar', [App\Http\Controllers\ProveedorController::class, 'editar'])->name('editarProveedores');
Route::post('/proveedores/{id}/editarProveedor', [App\Http\Controllers\ProveedorController::class, 'editarProveedor'])->name('editarProveedor');
Route::get('/proveedores/{id}/eliminar', [App\Http\Controllers\ProveedorController::class, 'eliminar'])->name('eliminarProveedores');


//Productos
Route::get('/productos/index', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos');
Route::get('/productos/{id}/show', [App\Http\Controllers\ProductoController::class, 'mostrar'])->name('mostrarProductos');
Route::get('/productos/crear', [App\Http\Controllers\ProductoController::class, 'crear'])->name('crearProductos');
Route::post('/productos/guardar', [App\Http\Controllers\ProductoController::class, 'guardar'])->name('guardarProductos');
Route::get('/productos/{id}/editar', [App\Http\Controllers\ProductoController::class, 'editar'])->name('editarProductos');
Route::post('/productos/{id}/editarProducto', [App\Http\Controllers\ProductoController::class, 'editarProducto'])->name('editarProductos');
Route::get('/productos/{id}/eliminar', [App\Http\Controllers\ProductoController::class, 'eliminar'])->name('eliminarProductos');


//Reportes
Route::get('/reportes/index', [App\Http\Controllers\ReporteController::class, 'index'])->name('reportes');

/*----------------------------------------------------------------------------------------------------------- */
//rutas del Frontend

Route::get('/frontend/inicio',[App\Http\Controllers\FrontendController::class,'inicio'])->name('inicio');

//aseo personal

Route::get('/frontend/aseopp',[App\Http\Controllers\FrontendController::class,'aseopp'])->name('aseopp');

//uso personal

Route::get('/frontend/usopp',[App\Http\Controllers\FrontendController::class,'usopp'])->name('usopp');

/*----------------------------------------------------------------------------------------------------------- */
Route::get('/frontend/productoslimpieza',[App\Http\Controllers\FrontendController::class,'productoslimpieza'])->name('productoslim');

Route::get('/frontend/accesorioslimpieza',[App\Http\Controllers\FrontendController::class,'accesorioslimpieza'])->name('accesorioslim');

Route::get('/frontend/detalle',[App\Http\Controllers\FrontendController::class,'detalle'])->name('detalle');