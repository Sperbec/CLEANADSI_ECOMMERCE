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
Route::get('/preguntasfrecuentes', [App\Http\Controllers\FrontendController::class, 'preguntasfrecuentes'])->name('preguntasfrecuentes');
Route::get('/sobrenosotros', [App\Http\Controllers\FrontendController::class, 'sobrenosotros'])->name('sobrenosotros');
Route::get('/politicasprivacidad', [App\Http\Controllers\FrontendController::class, 'politicasprivacidad'])->name('politicasprivacidad');

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
Route::post('/guardarOrdenCompra', [App\Http\Controllers\OrdenCompraController::class, 'guardarOrdenCompra'])->name('guardarOrdenCompra');
Route::get('/verOrdenCompra/{id}', [App\Http\Controllers\OrdenCompraController::class, 'verOrdenCompra'])->name('verOrdenCompra');
Route::get('/imprimirordencompra/{id}', [App\Http\Controllers\OrdenCompraController::class, 'imprimirordencompra'])->name('imprimirordencompra');
Route::post('/obtenerproducto', [App\Http\Controllers\ProductoController::class, 'obtenerproducto']);

//Mis pedidos
Route::get('/pedidos', [App\Http\Controllers\PedidosController::class, 'index'])->name('pedidos');

//Facturas
Route::resource('factura', App\Http\Controllers\FacturaController::class)->names('factura');
Route::get('/imprimirfactura/{id}', [App\Http\Controllers\FacturaController::class, 'imprimirfactura'])->name('imprimirfactura');

//Mi cuenta
Route::resource('micuenta', App\Http\Controllers\CuentaController::class)->names('micuenta');
Route::post('/changePassword/{id}', [App\Http\Controllers\CuentaController::class, 'changePassword'])->name('changePassword');
Route::post('/datosContacto/{id}', [App\Http\Controllers\CuentaController::class, 'datosContacto'])->name('datosContacto');
Route::post('/getPersonaContactoById', [App\Http\Controllers\CuentaController::class, 'getPersonaContactoById']);
Route::post('/updatePersonaContacto', [App\Http\Controllers\CuentaController::class, 'updatePersonaContacto'])->name('updatePersonaContacto');

/*----------------------------------------------------------------------------------------------------------- */
//rutas del Frontend

Route::get('frontend/inicio',[App\Http\Controllers\FrontendController::class,'nuevos_productos'])->name('inicio');

Route::get('/frontend/categoria/{id}',[App\Http\Controllers\FrontendController::class,'categorias_front'])->name('categoria_front');

Route::get('/frontend/aseo_general',[App\Http\Controllers\FrontendController::class,'categoria_aseo_general'])->name('Aseo_general');

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



//-----------------------------------------------------------------