<?php

use Illuminate\Support\Facades\Route;
/*Index */
use App\Http\Controllers\HomeController;
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

/*Previsualizacion producto */
use App\Http\Controllers\PrevController;
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

/*Login */
Route::get('/login', [LoginController::class,'show']);
Route::post('/login', [LoginController::class,'login']);
Route::get('/registro', [RegisterController::class,'show']);
Route::post('/registro', [RegisterController::class,'register']);
Route::get('/logout', [LogoutController::class,'logout']);

/* Ruta para las peliculas */
Route::get('Peliculas/{saga_peliculas}', [PeliculasController::class,'selectfranquicia']);
Route::get('Series/{saga_serie}', [SeriesController::class,'selectSeries']);
Route::get('Videojuegos/{saga_juego}', [VideojuegosController::class,'selectJuegos']);

/*Pedidos*/
Route::get('/pedidos', [PedidosController::class,'show','datos']);


/*Cart routes */

Route::post('/oftb_prev_prod', [PrevController::class,'prev_Articulo']);
Route::get('/oftb_prev_prod', [PrevController::class,'prev_Articulo']);



// Route::post('/prev_prod', [PrevControllerController::class,'prev_Articulo'])->name(name:'cart.store');

// Route::get('/prev_prod', function () {
//     return view('oftb_prev_prod');
// });

/*Contacto */

Route::get('/contacto', function () {
    return view('oftb_contacto');
});

Route::get('/pago', function () {
    return view('oftb_pago');
});

Route::get('/test', function () {
    return view('test');
});