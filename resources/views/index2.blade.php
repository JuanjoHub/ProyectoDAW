@extends('Layout.head');
@extends('Layout.navbar');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
<link rel="stylesheet" href="../css/css_plantilla.css">
<link rel="stylesheet" href="../css/css_index.css">
<link rel="stylesheet" href="../css/css_categorias.css">
@endsection

@section('navbar')
@endsection


<!------------------------------------------------------------------->
<!---------------------JUMBOTRON RESULTADOS-------------------------->
<!------------------------------------------------------------------->

    <div class="jumbotron jumbotron-fluid bg-transparent mb-4 jumbotron_dmc_index">
        <div class="container">
            <h1 class="display-4 text-white animate__animated animate__fadeInDown">Search results</h1>
        </div>
    </div>

 @if (count($articulos)<=0 || $texto==="")

        <div class="container text-white text-center mb-4">
            <h2> </h2>
            <h2> No matches found</h2>
        </div>
        
    
    @else  
      
        <div class="container">
            <div class="row">
                @foreach ($articulos as $articulo)
                    <div class="col-md-6 col-lg-4  col-sm-6 mb-4">
                        <div class="card p-3 text-right bg-transparent d-flex align-items-end"
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
                    </div>
                @endforeach
            </div>
            {{-- <button type="button" class="btn btn-outline-primary"><a class="dropdown-item" href="/home">Back to Home</a></button> --}}
        </div>

    <!------------------------------------------------------------------->
    <!--------------------------PAGINATION------------------------------->
    <!------------------------------------------------------------------->
    <div class="container">
        <div class="d-flex justify-content-center">
            {{$articulos->links()}}
        </div>
    </div>
        
   @endif


 
@section('scripts')
@endsection
@section('footer')
@endsection



</body>

</html>