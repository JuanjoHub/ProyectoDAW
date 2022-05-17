@extends('navbar_footer');

<link rel="stylesheet" href="../css/css_pedidos.css">
{{-- <link rel="stylesheet" href="../css/css_plantilla.css"> --}}

@section('content')
    {{ $i = 1 }}

    <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 1-------------------------------->
    <!------------------------------------------------------------------->
    <div class="jumbotron jumbotron-fluid bg-transparent">
        <div class="container mt-5">
            <h1 class="display-4 text-white animate__animated animate__lightSpeedInLeft">Mis pedidos</h1>
        </div>
    </div>

    <!--PEDIDOS-->
    {{-- <div class="container mb-5 ">
        <table class="table table-hover table-dark ">
            <thead class="titulos_pedidos">
                <tr>
                    <th scope="col">Fecha Pedido</th>
                    <th scope="col">Nº Pedido</th>
                    <th scope="col">Estado Pedido</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <!--1 ROW-->
                @foreach ($mispedidos as $pedido)
                    <tr class="cells_pedidos">

                        <th scope="row">{{ $pedido->fecha_pedido }}</th>
                        <td>{{ $pedido->cod_pedido }}</td>
                        <td>{{ $pedido->estado }}</td>
                        <td>{{ $pedido->total }}€</td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div> --}}

    {{-- Ejemplo 1 --}}

    <div class="container mb-5">
        <div class="row text-left" style="color:white; background-color:black; ">
            <div class="col-lg-3 mt-2 mb-2">
                Fecha pedido
            </div>
            <div class="col-lg-3 mt-2 mb-2">
                Nº Pedido
            </div>
            <div class="col-lg-3 mt-2 mb-2">
                Estado Pedido
            </div>
            <div class="col-lg-3 mt-2 mb-2">
                Total
            </div>
        </div>
        @foreach ($mispedidos as $pedido)
            <div style="color:white;" class="row text-left mydivpedidos" text-center" type="button" data-toggle="collapse"
                data-target="#multiCollapseExample{{ $i }}" aria-expanded="false"
                aria-controls="multiCollapseExample{{ $i }}">

                <div class="col-lg-3 mt-2 mb-2">
                    <th scope="row">{{ $pedido->fecha_pedido }}
                </div>
                <div class="col-lg-3 mt-2 mb-2">
                    <th scope="row">{{ $pedido->cod_pedido }}
                </div>
                <div class="col-lg-3 mt-2 mb-2">
                    <th scope="row">{{ $pedido->estado }}
                </div>
                <div class="col-lg-3 mt-2 mb-2">
                    <th scope="row">{{ $pedido->total }}
                </div>

            </div>


            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample{{ $i }}">
                        <div class="card card-body">
                            <div class="container mb-5 ">
                                <table class="table table-hover table-dark ">
                                    <thead class="titulos_pedidos">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--1 ROW-->
                                        @foreach ($miscontenidos as $contenido)
                                            {{-- @foreach ($miscodigos as $codigo) --}}
                                                {{-- @if ($codigo->cod_pedido == $contenido->cod_pedido) --}}
                                            <tr class="cells_pedidos">
                                                <th scope="row">{{  $contenido->nombre_articulo }}</th>
                                                <td>{{ $contenido->cantidad }}</td>
                                                <td>{{ $contenido->precio  }}€</td>
                                            </tr>
                                              {{-- @endif --}}
                                            {{-- @endforeach --}}
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php $i++;
            ?>
        @endforeach
    </div>


   

    {{-- Ejemplo 2 --}}
    {{-- <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
            aria-controls="multiCollapseExample1">Toggle first element</a>

        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2"
            aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
            
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse"
            aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
    </p>
    <div class="row">
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                    Some placeholder content for the first collapse component of this multi-collapse example. This panel is
                    hidden by default but revealed when the user activates the relevant trigger.
                </div>
            </div>
        </div>
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card card-body">
                    Some placeholder content for the second collapse component of this multi-collapse example. This panel is
                    hidden by default but revealed when the user activates the relevant trigger.
                </div>
            </div>
        </div>
    </div> --}}



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
