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

/*Peliculas 
Route::get('Peliculas/{nombre}', PeliculasController::class,'oftb_peliculas_dc');
Route::get('Peliculas/{nombre}', PeliculasController::class,'oftb_peliculas_marvel');
Route::get('Peliculas/{nombre}', PeliculasController::class,'oftb_peliculas_esdla');
Route::get('Peliculas/{nombre}', PeliculasController::class,'oftb_peliculas_starwars');
*/

Route::get('Peliculas/{franquicia}', [PeliculasController::class,'selectfranquicia']);

/*
Route::get('Peliculas/dc', [PeliculasController::class,'dc']);
Route::get('Peliculas/marvel', [PeliculasController::class,'marvel']);
Route::get('Peliculas/esdla', [PeliculasController::class,'tlotr']);
Route::get('Peliculas/sw', [PeliculasController::class,'sw']);
*/
/*
Route::get('/dc', function () {
    return view('oftb_peliculas_dc');
});

Route::get('/esdla', function () {
    return view('oftb_peliculas_esdla');
});

Route::get('/marvel', function () {
    return view('oftb_peliculas_marvel');
});

Route::get('/sw', function () {
    return view('oftb_peliculas_starwars');
});
*/
/*Series */

Route::get('/got', function () {
    return view('oftb_series_got');
});

Route::get('/pk', function () {
    return view('oftb_series_peakyblinders');
});

Route::get('/tb', function () {
    return view('oftb_series_theboys');
});

Route::get('/wd', function () {
    return view('oftb_series_walkingdead');
});

/*Juegos */

Route::get('/Videojuegos/dmc', function () {
    
    return view('Videojuegos.oftb_juegos_dmc');
});

Route::get('/Videojuegos/gow', function () {
    return view('Videojuegos.oftb_juegos_gow');
});

Route::get('/Videojuegos/mk', function () {
    return view('Videojuegos.oftb_juegos_mk');
});

Route::get('/Videojuegos/re', function () {
    return view('Videojuegos.oftb_juegos_re');
});

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