<?php

use App\Http\Controllers\FrontendController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;

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

//Mis pedidos
Route::get('/pedidos', [App\Http\Controllers\PedidosController::class, 'index'])->name('pedidos');

//Mi cuenta
Route::get('/micuenta', [App\Http\Controllers\CuentaController::class, 'index'])->name('micuenta');

/*----------------------------------------------------------------------------------------------------------- */
//rutas del Frontend

Route::get('frontend/inicio',[App\Http\Controllers\FrontendController::class,'nuevos_productos'])->name('inicio');

Route::get('/frontend/aseo_personal',[App\Http\Controllers\FrontendController::class,'categoria_aseo_personal'])->name('aseo_personal');

Route::get('/frontend/aseo_general',[App\Http\Controllers\FrontendController::class,'categoria_aseo_general'])->name('aseo_general');

Route::get('/frontend/detalle/{producto}',[App\Http\Controllers\FrontendController::class,'detalle'])->name('detalle');
//rutas para crear productos (probicional)

Route::post('frontend',[App\Http\Controllers\FrontendController::class, 'store'])->name('store');

Route::get('frontend/crear',[App\Http\Controllers\FrontendController::class, 'crear'])->name('crear');

//------------------------------------rutas del carrito de compras
Route::get('frontend/carrito', [FrontendController::class, 'carrito'])->name('carrito');
Route::get('add-to-carrito/{id}', [FrontendController::class, 'añadir_carrito'])->name('carrito.añadir');
Route::patch('update-cart', [FrontendController::class, 'update'])->name('carrito.update');
Route::delete('remove-from-cart', [FrontendController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('frontend/detalle', [FrontendController::class, 'detalle_compra'])->name('carrito.compra');



/* rutas de la factura y detalle de factura*/
 Route::get('facturas/facturas', [FacturaController::class, 'factura'])->name('factura'); 
 Route::post('facturas/', [FacturaController::class, 'crear_factura'])->name('factura.crear'); 