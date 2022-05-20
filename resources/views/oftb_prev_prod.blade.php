@extends('navbar_footer');

<link rel="stylesheet" href="../css/css_plantilla.css">
<link rel="stylesheet" href="../css/css_prev_prod.css">
<link rel="stylesheet" href="../css/css_pago.css">
<!--Acerca del producto-->
@section('content')

    <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 1-------------------------------->
    <!------------------------------------------------------------------->
    <div class="jumbotron jumbotron-fluid jumbotron_prev">
        <div class="container mt-5">
            <h1 class="display-4 text-white animate__animated animate__lightSpeedInLeft"></h1>
        </div>
    </div>

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
                                Categoria | Nombre |{{ ' Stock' }}<i
                                    class="fa-solid fa-check icon-green fa-lg text-center ml-2 mt-auto mb-auto"></i>
                            @else
                                Categoria |{{ ' Fuera de stock' }}<i
                                    class="fa-solid fa-xmark icon_stock fa-lg text-center ml-2 mt-auto mb-auto "></i>
                            @endif
                        </p>
                    </div>
                    <p class="text-center precio mt-4 mb-4">Precio final: {{ $prod->precio }}€</p>

                    <button type="submit" class="btn btn-lg btn-block div_compra mt-3">Comprar</button>

                </div>
            </div>
        </div>



        <div class="container mb-5">
            <div class="row">
                <!--Carta de presentacion-->
                <div class="col-lg-6 rounded-left rounded-right rounded-top rounded-bottom mb-4">
                    <h2 class="mb-4" style="color: #fff;">Acerca del producto</h2>

                    <!-- Categoria | Nombre  | Stock | -->
                    <p>{{ $prod->descripcion }}</p>

                </div>
                <!--div separador-->
                <div class="col-lg-1">
                </div>
                <!--Descripcion-->
                <div class="col-lg-5 rounded-left rounded-right rounded-top rounded-bottom mb-4 p-2">
                    <h2 class="mb-4" style="color: #fff;">Composición y cuidados</h2>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eum consectetur quisquam vel est aspernatur quas in dolorem odit quae itaque necessitatibus aliquid
                        totam non culpa</p>

                </div>
            </div>
        </div>
    @endforeach




    </body>

    </html>
