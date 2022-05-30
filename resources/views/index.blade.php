@extends('Layout.head');
@extends('Layout.navbar');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
<link rel="stylesheet" href="../css/css_plantilla.css">
<link rel="stylesheet" href="../css/css_index.css">
@endsection

@section('standard_navbar')
  
@endsection

 @if(session()->has('message'))
                    <div class="alert alert-success text-center animate__animated animate__fadeInDown" style="margin-top:70px;">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
 @endif    
 
    <!------------------------------------------------------------------->
    <!--------------------------CAROUSEL--------------------------------->
    <!------------------------------------------------------------------->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">


            <!--Primer slider-->
            <div class="carousel-item active"
                style="background-image:url(../Imagenes_OFTB/Imagenes_carrusel/sauron_carousel.jpg)">
             
                <div class="carousel-caption text-center animate__animated animate__fadeInDown">
                    <h1>Welcome to Out of the Box</h1>
                    <h2>Top quality items</h2>
                    <a class="btn btn-outline-light btn-md" href="/Peliculas/esdla">Check it</a>
                </div>
            </div>


            <!--Segundo slider-->
            <div class="carousel-item" style="background-image: url(../Imagenes_OFTB/Imagenes_carrusel/theboys_carousel.jpg);">
                <div class="carousel-caption text-center mb-5 animate__animated animate__fadeInDown">
                    <h1>Welcome to Out of the Box</h1>
                    <h2>Top quality items</h2>
                    <a class="btn btn-outline-light btn-lg" href="/Series/theboys">Check it</a>
                </div>
            </div>

            <!--Tercer slider-->
            <div class="carousel-item" style="background-image: url(../Imagenes_OFTB/Imagenes_carrusel/re2.jpg);">
                <div class="carousel-caption text-center mb-5 animate__animated animate__fadeInDown">
                    <h1>Welcome to Out of the Box</h1>
                    <h2>Top quality items</h2>
                    <a class="btn btn-outline-light btn-lg" href="/Videojuegos/re">Check it</a>
                </div>
            </div>
            <!--Final del carousel inner-->
            <!--Flecha del slider anterior-->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <!--Flecha del slider siguiente-->
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 1-------------------------------->
    <!------------------------------------------------------------------->
    <div class="jumbotron jumbotron-fluid bg-transparent mb-0">
        <div class="container">
            <h1 class="display-4 text-white animate__animated animate__bounce">New releases</h1>
        </div>
    </div>

 

    <!--CARTAS DE LAS ULTIMAS NOVEDADES-->
    <div class="container">
        <div class="row">
            @foreach ($articulos_a as $novedad)
                <div class="col-md-6 col-lg-4  col-sm-6 mb-4">
                    <div class="card p-3 text-right bg-transparent d-flex align-items-end"
                        style="border: none; background-image:url(..{{ $novedad->imagen }});">
                        <form action="/oftb_prev_prod" method="POST">
                            @csrf
                            <input type="hidden" name="cod_articulo" value="{{ $novedad->cod_articulo }}">
                            <button type="submit" class="boton_detalles rounded-left rounded-right rounded-top">
                                View Details
                            </button>
                        </form>
                    </div>
                    <blockquote class="blockquote mt-1">
                        <div class="d-flex justify-content-between">
                            <p>{{ $novedad->nombre_articulo }}</p>
                            <p class="font-weight-bold">{{ $novedad->precio }} €</p>
                        </div>
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>
    <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 2-------------------------------->
    <!------------------------------------------------------------------->

    <div class="jumbotron jumbotron-fluid bg-transparent mb-0">
        <div class="container">
            <h1 class="display-4 text-white">Bestselling</h1>
        </div>
    </div>
    
    <!--CARTAS DE PRODUCTOS MAS VENDIDOS-->
    <div class="container">
        <div class="row mb-2">
            @foreach ($articulos_b as $vendido)
                <div class="col-md-6 col-lg-4  col-sm-6 mb-4">
                    <div class="card p-3 text-right bg-transparent d-flex align-items-end"
                        style="border: none; background-image:url(..{{ $vendido->imagen }});">
                        <form action="/oftb_prev_prod" method="POST">
                            @csrf
                            <input type="hidden" name="cod_articulo" value="{{ $vendido->cod_articulo }}">
                            <button type="submit" class="boton_detalles rounded-left rounded-right rounded-top">
                                View Details
                            </button>
                        </form>
                    </div>
                    <blockquote class="blockquote mt-1">
                        <div class="d-flex justify-content-between">
                            <p>{{ $vendido->nombre_articulo }}</p>
                            <p class="font-weight-bold">{{ $vendido->precio }} €</p>
                        </div>
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>

@section('scripts')
@endsection
@section('footer')
@endsection


</body>

</html>
