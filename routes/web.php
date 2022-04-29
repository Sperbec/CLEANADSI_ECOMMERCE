<?php

use App\Http\Controllers\ClienteController;
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


 Route::get('/',[App\Http\Controllers\FrontendController::class,'nuevos_productos'])->name('inicio');


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
Route::resource('proveedores', App\Http\Controllers\ProveedorController::class)->names('proveedores');

//Clientes
Route::resource('clientes', App\Http\Controllers\PersonaController::class)->names('clientes');

//Orden de compra
Route::get('/orden/crear', [App\Http\Controllers\OrdenCompraController::class, 'crear'])->name('crearOrdenCompra');
Route::get('/orden/consultar', [App\Http\Controllers\OrdenCompraController::class, 'consultar'])->name('consultarOrdenCompra');

/*----------------------------------------------------------------------------------------------------------- */
//rutas del Frontend

Route::get('frontend/inicio',[App\Http\Controllers\FrontendController::class,'nuevos_productos'])->name('inicio');

Route::get('/frontend/aseo_personal',[App\Http\Controllers\FrontendController::class,'categoria_aseo_personal'])->name('aseo_personal');

Route::get('/frontend/aseo_general',[App\Http\Controllers\FrontendController::class,'categoria_aseo_general'])->name('aseo_general');

Route::get('/frontend/detalle/{producto}',[App\Http\Controllers\FrontendController::class,'detalle'])->name('detalle');
//rutas para crear productos (probicional)

Route::post('frontend',[App\Http\Controllers\FrontendController::class, 'store'])->name('store');

Route::get('frontend/crear',[App\Http\Controllers\FrontendController::class, 'crear'])->name('crear');