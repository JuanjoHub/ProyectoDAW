<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class SeriesController extends Controller
{
    public function selectSeries($saga_serie)
    {
        $url = "Series.oftb_series_";
        $got = Articulo::where('cod_categoria', '=', '5')->paginate(3);
        $pk = Articulo::where('cod_categoria', '=', '6')->paginate(3);
        $tb = Articulo::where('cod_categoria', '=', '7')->paginate(3);
        $wd = Articulo::where('cod_categoria', '=', '8')->paginate(3);
        $user = Auth::user();

        if (Auth::check()) {
            $count = Cart::where('username', $user->username)->count();
            switch ($saga_serie) {
                case 'got':
                    return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $got, 'quantityCard' => $count]);
                case 'peakyblinders':
                    return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $pk, 'quantityCard' => $count]);
                case 'theboys':
                    return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $tb, 'quantityCard' => $count]);
                case 'walkingdead':
                    return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $wd, 'quantityCard' => $count]);
                    break;
                default:
                    return view('home');
                    break;
            }
        }
        switch ($saga_serie) {
            case 'got':
                return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $got]);
            case 'peakyblinders':
                return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $pk]);
            case 'theboys':
                return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $tb]);
            case 'walkingdead':
                return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $wd]);
                break;
            default:
                return view('home');
                break;
        }
    }

    public function search($saga_serie, Request $request)
    {

        $url = "Series.oftb_series_";

        $texto = trim($request->input(key: 'texto'));

        $user = Auth::user();
        $count = Cart::where('username', $user->username)->count();
        $articulos = Articulo::where('nombre_articulo', 'LIKE', '%' . $texto . '%')
            ->orderBy('ventas_totales')
            ->paginate(200);

        if (Auth::check()) {
            switch ($saga_serie) {
                case 'got':
                    return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos, 'quantityCard' => $count]);
                case 'peakyblinders':
                    return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos, 'quantityCard' => $count]);
                case 'theboys':
                    return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos, 'quantityCard' => $count]);
                case 'walkingdead':
                    return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos, 'quantityCard' => $count]);
                    break;
                default:
                    return view('/home');
                    break;
            }
        }
        switch ($saga_serie) {
            case 'got':
                return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos]);
            case 'peakyblinders':
                return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos]);
            case 'theboys':
                return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos]);
            case 'walkingdead':
                return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos]);
                break;
            default:
                return view('/home');
                break;
        }
    }
}
