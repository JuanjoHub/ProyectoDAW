<?php

use Illuminate\Support\Facades\Route;
/*Index */
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home2Controller;
/*Login */
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
/*Categorias */
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\VideojuegosController;

/*Pedidos */
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\DetallesController;

/*Previsualizacion producto */
use App\Http\Controllers\PrevController;

/*Previsualizacion producto */
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PagoReadyController;

/*Carrito */
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

use App\Models\User;
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

// Route::get('/', function () {
//     return view('welcome');
// });

/*Index */
Route::get('/home', [HomeController::class,'index']);
Route::post('/home2', [Home2Controller::class,'show']);
Route::get('/home2', [Home2Controller::class,'show']);

/*Login */
Route::get('/login', [LoginController::class,'show']);
Route::post('/login', [LoginController::class,'login']);
Route::get('/registro', [RegisterController::class,'show']);
Route::post('/registro', [RegisterController::class,'register']);
Route::get('/logout', [LogoutController::class,'logout']);

/* Ruta para las peliculas */
Route::get('Peliculas/{saga_peliculas}', [PeliculasController::class,'selectfranquicia']);
Route::post('Peliculas/{saga_peliculas}', [PeliculasController::class,'search']);
/* Ruta para las series */
Route::get('Series/{saga_serie}', [SeriesController::class,'selectSeries']);
Route::post('Series/{saga_serie}', [SeriesController::class,'search']);
/* Ruta para los videojuegos */
Route::get('Videojuegos/{saga_juego}', [VideojuegosController::class,'selectJuegos']);
Route::post('Videojuegos/{saga_juego}', [VideojuegosController::class,'search']);
/*Pedidos*/
Route::get('/pedidos', [PedidosController::class,'show','datos']);
Route::post('/detalles', [DetallesController::class,'show']);

/* Vista previa productos routes */
Route::post('/oftb_prev_prod', [PrevController::class,'prev_Articulo']);
Route::get('/oftb_prev_prod', [PrevController::class,'prev_Articulo']);

/* Pago */
Route::post('/pago', [PagoController::class,'show']);
Route::get('/pago', [PagoController::class,'show']);
Route::POST('/pago_realizado',[PagoReadyController::class,'pago']);

/* Carrito */
Route::post('/addcart/{cod_articulo}',[CartController::class,'addcart']);
Route::get('/showcart',[CartController::class,'show']);
Route::get('/delete/{id}',[CartController::class,'deletecart']);


Route::get('/test', function () {
    return view('test');
});
/*Contacto */
Route::get('/contacto', function () {
    return view('oftb_contacto');
});