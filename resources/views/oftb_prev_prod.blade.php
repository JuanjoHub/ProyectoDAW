@extends('Layout.head');
@extends('Layout.navbar');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
    <link rel="stylesheet" href="../css/css_plantilla.css">
    <link rel="stylesheet" href="../css/css_prev_prod.css">
    {{-- <link rel="stylesheet" href="../css/css_pago.css"> --}}
@endsection

@section('standard_navbar')
@endsection


<!------------------------------------------------------------------->
<!------------------------JUMBOTRON 1-------------------------------->
<!------------------------------------------------------------------->
<div class="jumbotron jumbotron-fluid jumbotron_prev">
    <div class="container mt-5">
        <h1 class="display-4 text-white animate__animated animate__lightSpeedInLeft"></h1>
    </div>
</div>

@include('Mensajes.mensajesStock') 

<!------------------------------------------------------------------->
<!--------------------CARTA/DESCRIPCION PRODUCTO--------------------->
<!------------------------------------------------------------------->
@foreach ($preview as $prod)
    <div class="container mb-1">
        <div class="row">
            <!--Carta de presentacion-->
            <div class="col-lg-6 card_imagen rounded-left rounded-right rounded-top rounded-bottom mb-4"
                style="background-image: url(..{{ $prod->imagen }});">
            </div>

            <!--div separador-->
            <div class="col-lg-1">
            </div>

            <!--Descripcion-->
            <div class="col-lg-5 card_descripcion rounded-left rounded-right rounded-top rounded-bottom text-center">
                <h2 style="color: #fff;" class="mt-4"> {{ $prod->nombre_articulo }}</h2>

                <div class="div_cns mb-3 mt-4 p-3">
                    <p class="d-flex justify-content-center">
                        @if ($prod->stock > 0)
                            {{ ' Stock' }}<i
                                class="fa-solid fa-check icon-green fa-lg text-center ml-2 mt-auto mb-auto"></i>
                        @else
                            {{ ' Fuera de stock' }}<i
                                class="fa-solid fa-xmark icon_stock fa-lg text-center ml-2 mt-auto mb-auto "></i>
                        @endif
                    </p>
                </div>
                <p class="text-center precio mt-3">Price: {{ $prod->precio }}€</p>
                @if ($prod->stock > 0)
                    {{-- Add to cart --}}
                    <form action="{{ url('addcart', $prod->cod_articulo) }}" method="POST" class="text-center">
                        @csrf

                        <div class="form-row font-weight-bold">
                        <input type="hidden" name="cod_articulo" value="{{ $prod->cod_articulo }}">
                            <div class="form-group col-md-12 d-flex justify-content-center input-group">
                                <div class="input-group-prepend mr-1">
                                    <span class="input-group-text">Amount</span>
                                </div>
                                <input type="number" value="1" min="1" name="quantity" maxlength="3" class="rounded">
                            </div>
                            <div class="form-group col-md-12 text-center">
                                <button type="submit" class="btn btn_compra">Add to cart</button>
                            </div>
                        </div>
                    </form>
                    {{-- ------------ --}}
                    {{-- <form action="{{ url('addcart', $prod->cod_articulo) }}" method="POST">
                        @csrf
                        <input type="hidden" name="singlePayment" value="{{ $prod->cod_articulo }}">
                        <button type="submit" class="btn btn_compra mt-3">Purchase</button>
                    </form> --}}
                @else
                    <button class="btn btn_sold mt-3">Sold out</button>
                @endif


            </div>
        </div>
    </div>



    <div class="container mb-5">
        <div class="row">
            <!--Carta de presentacion-->
            <div class="col-lg-6 rounded-left rounded-right rounded-top rounded-bottom mb-4">
                <h2 class="mb-4" style="color: #fff;">About the product</h2>

                <!-- Categoria | Nombre  | Stock | -->
                <p>{{ $prod->descripcion }}</p>

            </div>
            <!--div separador-->
            <div class="col-lg-1">
            </div>
            <!--Descripcion-->
            <div class="col-lg-5 rounded-left rounded-right rounded-top rounded-bottom mb-4">
                <h2 class="mb-4" style="color: #fff;">Composition and care</h2>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eum consectetur quisquam vel est aspernatur quas in dolorem odit quae itaque necessitatibus aliquid
                    totam non culpa</p>

            </div>
        </div>
    </div>
@endforeach




</body>

</html>
