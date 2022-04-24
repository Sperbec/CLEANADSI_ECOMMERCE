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
    return view('/frontend/inicio');
});

Auth::routes();

//Paises
Route::resource('pais', App\Http\Controllers\PaisController::class)->names('pais');

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

Route::get('/frontend/inicio',[App\Http\Controllers\FrontendController::class,'inicio'])->name('inicio');

//aseo personal

Route::get('/frontend/aseopp',[App\Http\Controllers\FrontendController::class,'aseopp'])->name('aseopp');

//uso personal

Route::get('/frontend/usopp',[App\Http\Controllers\FrontendController::class,'usopp'])->name('usopp');

/*----------------------------------------------------------------------------------------------------------- */
Route::get('/frontend/productoslimpieza',[App\Http\Controllers\FrontendController::class,'productoslimpieza'])->name('productoslim');

Route::get('/frontend/accesorioslimpieza',[App\Http\Controllers\FrontendController::class,'accesorioslimpieza'])->name('accesorioslim');

Route::get('/frontend/detalle',[App\Http\Controllers\FrontendController::class,'detalle'])->name('detalle');

Route::get('/carritocompras', [App\Http\Controllers\CarritoComprasController::class, 'index']);

