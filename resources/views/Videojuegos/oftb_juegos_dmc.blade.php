@extends('navbar_footer');

<link rel="stylesheet"  type="text/css" href="{!! asset('css/css_plantilla.css') !!}">
<link rel="stylesheet"  type="text/css" href="{!! asset('css/css_categorias.css') !!}">

@section('content')

 
      <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 1-------------------------------->
    <!------------------------------------------------------------------->
    <div class="jumbotron jumbotron_dmc">
        <div class="container">
            <h1 class="display-4 text-white animate__animated animate__fadeInDown">Devil May Cry</h1>
        </div>
    </div>


   
<!--CARTAS DE PRODUCTOS-->
    <div class="container">
        <div class="row mb-2">
            @foreach ($articulo_juegos as $articulo)
                @if ($articulo->cod_categoria == 9)
                    <div class="col-md-6 col-lg-4 mb-4 mb-4">
                        <div class="card p-3 text-right bg-transparent" style="border: none;">
                            <blockquote class="blockquote mb-0">
                                <div class="d-flex justify-content-between">
                                    <p>{{ $articulo->nombre_articulo }}</p>
                                    <p class="font-weight-bold">{{ $articulo->precio }} €</p>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!------------------------------------------------------------------->
    <!--------------------------PAGINATION------------------------------->
    <!------------------------------------------------------------------->
   
    <div class="container text-center mb-5">
        <nav>
            <ul class="pagination pagination-lg justify-content-center ">
                <!--PREVIO-->
                <li class="page-item mr-2">
                    <a class="page-link" href="#"><i class="fa-solid fa-angle-left"></i></a>
                </li>
                <!--PAGINAS-->
                <li class="page-item mr-1"><a class="page-link" href="#">1</a></li>
                <li class="page-item "><a class="page-link current_page" href="#">2</a></li>
                <li class="page-item ml-1"><a class="page-link" href="#">3</a></li>
                 <!--NEXT-->
                <li class="page-item ml-2">
                    <a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>


</body>

</html>