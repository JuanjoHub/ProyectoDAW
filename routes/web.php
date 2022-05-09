<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\VideojuegosController;
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
    return view('welcome');
});

/*Index */
Route::get('/home', HomeController::class);


/* Ruta para las peliculas */
Route::get('Peliculas/{saga_peliculas}', [PeliculasController::class,'selectfranquicia']);

Route::get('Series/{saga_serie}', [SeriesController::class,'selectSeries']);

Route::get('Videojuegos/{saga_juego}', [VideojuegosController::class,'selectJuegos']);


/*Contacto */

Route::get('/contacto', function () {
    return view('oftb_contacto');
});

Route::get('/login', function () {
    return view('oftb_login');
});

Route::get('/registro', function () {
    return view('oftb_registro');
});

Route::get('/prev_prod', function () {
    return view('oftb_prev_prod');
});

Route::get('/pago', function () {
    return view('oftb_pago');
});

Route::get('/test', function () {
    return view('test');
});