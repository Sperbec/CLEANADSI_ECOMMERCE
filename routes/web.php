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

Route::resource('users', App\Http\Controllers\UserController::class)->names('users');

//Paises
Route::resource('pais', App\Http\Controllers\PaisController::class)->names('pais');

//Departamentos
Route::resource('departamento', App\Http\Controllers\DepartamentoController::class)->names('departamento');
Route::post('/obtenerdepartamentos', [App\Http\Controllers\DepartamentoController::class, 'obtenerdepartamentos']);
Route::post('/getDepartamentoById', [App\Http\Controllers\DepartamentoController::class, 'getDepartamentoById']);
Route::post('/updateDepartamento', [App\Http\Controllers\DepartamentoController::class, 'updateDepartamento']);
Route::post('/eliminarDepartamento', [App\Http\Controllers\DepartamentoController::class, 'eliminarDepartamento']);

//Municipios
Route::resource('municipio', App\Http\Controllers\MunicipioController::class)->names('municipio');
Route::post('/obtenermunicipios', [App\Http\Controllers\MunicipioController::class, 'obtenermunicipios']);
Route::post('/getMunicipioById', [App\Http\Controllers\MunicipioController::class, 'getMunicipioById']);
Route::post('/updateMunicipio', [App\Http\Controllers\MunicipioController::class, 'updateMunicipio']);
Route::post('/eliminarMunicipio', [App\Http\Controllers\MunicipioController::class, 'eliminarMunicipio']);

//Barrios
Route::resource('barrio', App\Http\Controllers\BarrioController::class)->names('barrio');
Route::post('/obtenerbarrios', [App\Http\Controllers\BarrioController::class, 'obtenerbarrios']);
Route::post('/getBarrioById', [App\Http\Controllers\BarrioController::class, 'getBarrioById']);
Route::post('/updateBarrio', [App\Http\Controllers\BarrioController::class, 'updateBarrio']);
Route::post('/eliminarBarrio', [App\Http\Controllers\BarrioController::class, 'eliminarBarrio']);


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

