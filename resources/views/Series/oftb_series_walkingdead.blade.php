@extends('Layout.head');
@extends('Layout.navbar_series');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
<link rel="stylesheet" href="../css/css_categorias.css">
<link rel="stylesheet" href="../css/css_plantilla.css">
@endsection

@section('navbar_peliculas')
@endsection




    <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 1-------------------------------->
    <!------------------------------------------------------------------->
    <div class="jumbotron jumbotron-fluid jumbotron_wd">
        <div class="container">
            <h1 class="display-4 text-white animate__animated animate__fadeInDown">The Walking Dead</h1>
        </div>
    </div>


<!--CARTAS DE PRODUCTOS-->
    <div class="container">
        <div class="row mb-2">
            @foreach ($articulo_series as $articulo)
                @if ($articulo->cod_categoria == 8)
                    <div class="col-md-6 col-lg-4 col-sm-6 mb-2">

                        <div class="card p-3 bg-transparent d-flex align-items-end"
                            style="border: none; background-image:url(..{{ $articulo->imagen }});">
                            <form action="/oftb_prev_prod" method="POST">
                                @csrf
                                <input type="hidden" name="cod_articulo" value="{{ $articulo->cod_articulo }}">
                                <button type="submit" class="boton_detalles rounded-left rounded-right rounded-top">
                                    View Details
                                </button>
                            </form>
                        </div>

                        <blockquote class="blockquote mt-1">
                            <div class="d-flex justify-content-between">
                                <p>{{ $articulo->nombre_articulo }}</p>
                                <p class="font-weight-bold">{{ $articulo->precio }} €</p>
                            </div>
                        </blockquote>
                        <div>

                            {{-- <form action="{{ 'cart.store' }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $articulo->cod_articulo}}">
                                    <input wire:model="quantity.{{ $articulo->cod_articulo}}" type="number"
                                        class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                                        style="width: 50px" />
                                    <button type="submit" class="bg-dark">
                                        Add to Cart
                                    </button>
                                </form> --}}

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
 

 <!------------------------------------------------------------------->
    <!--------------------------PAGINATION------------------------------->
    <!------------------------------------------------------------------->
   
   <div class="container">
        <div class="d-flex justify-content-center">
            {{$articulo_series->links()}}
        </div>
    </div>


@section('footer')
@endsection
@section('scripts')
@endsection


</body>

</html>