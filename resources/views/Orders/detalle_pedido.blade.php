@extends('Layout.head');
@extends('Layout.navbar_pedidos');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
    <link rel="stylesheet" href="../css/css_pedidos.css">
@endsection

@section('navbar_pedidos')
@endsection



<!------------------------------------------------------------------->
<!------------------------JUMBOTRON 1-------------------------------->
<!------------------------------------------------------------------->
<?php $precio = 0; ?>

<div class="jumbotron jumbotron-fluid bg-transparent">
    <div class="container mt-5">
        <h1 class="display-4 text-white animate__animated animate__lightSpeedInLeft">Order details</h1>

    </div>
</div>

@foreach ($dameDatos as $dato)
    
    <!-- Detalle del pedido -->
    <div class="container text-white mb-5">
        <h2 class="display-5 text-white animate__animated animate__lightSpeedInLeft">Date/number</h2>

        <table class="table table-bordered table-dark">
            <tr>
                <td class="col-8">Order number</td>
                <td> {{ $dato->pedido_id }}</td>
            </tr>
            <tr>
                <td>Order date</td>
                <td> {{ $dato->fecha_pedido }}</td>
            </tr>
            <tr>
                <td>Expected delivery date</td>
                <td> {{ $dato->fecha_prev_envio }}</td>
            </tr>

        </table>
    </div>

    <!-- Direccion de facturacion -->
    <div class="container text-white mb-5">
        <h2 class="display-5 text-white animate__animated animate__lightSpeedInLeft">Address information</h2>

        <table class="table table-bordered table-dark">
            <tr>
                <td class="col-8">Name addressee</td>
                <td> {{ $dato->nombre_destinatario }}</td>
            </tr>
            <tr>
                <td>Shipping Address</td>
                <td> {{ $dato->direccion_envio }}</td>
            </tr>
            <tr>
                <td>Country region</td>
                <td> {{ $dato->CCAA }}</td>
            </tr>

        </table>
    </div>


    <!-- Informacion del pago -->

    <div class="container text-white mb-5">
        <h2 class="display-5 text-white animate__animated animate__lightSpeedInLeft">Payment information</h2>

        <table class="table table-bordered table-dark">
            <tr>
                <td class="col-8">Payment method</td>
                <td> {{ $dato->metodo_pago }} terminated in {{ $dato->numero_tarjeta }}</td>
            </tr>
            <tr>
                <td>Order Status</td>
                @if ($dato->estado == 'Returned')
                    <td> {{ $dato->estado }}<i class="fa-solid fa-check fa-lg text-center ml-2 mt-auto mb-auto"
                            style="color:green;"></i></td>
                @elseif ($dato->estado == 'Send')
                    <td> {{ $dato->estado }}<i class="fa-solid fa-paper-plane fa-lg text-center ml-2 mt-auto mb-auto"
                            style="color:green;"></i></td>
                @elseif ($dato->estado == 'Delivered')
                    <td> {{ $dato->estado }}<i class="fa-solid fa-check fa-lg text-center ml-2 mt-auto mb-auto"
                            style="color:green;"></i></td>
                @elseif ($dato->estado == 'Canceled')
                    <td> {{ $dato->estado }}<i
                            class="fa-solid fa-xmark icon_stock fa-lg text-center ml-2 mt-auto mb-auto "
                            style="color:red;"></i> </td>
                @else
                    <td> {{ $dato->estado }}</td>
                @endif
                <?php $status = $dato->estado; ?>
            </tr>
        </table>
    </div>
@endforeach


<div class="container">
    <h2 class="display-5 text-white animate__animated animate__lightSpeedInLeft">Products</h2>
</div>


<!--Productos-->
<div class="container mb-5 ">
    <table class="table table-hover table-dark table-bordered ">
        <thead class="titulos_pedidos">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <!--1 ROW-->
             <?php $totalPrice = 0 ?>
            @foreach ($detalles as $detalle)
                <tr>

                    <td>{{ $detalle->nombre_articulo }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->precio }}€</td>
                     <?php $total = $detalle->cantidad * $detalle->precio; ?>
                    <td>{{ $total }}€</td>
                     <?php $totalPrice = $totalPrice + $total; ?>
                </tr>
            @endforeach
            <tr style=" font-weight: bold;">
                @if ($status == 'Returned')
                    <td colspan="3">amount to return</td>
                    <td> {{ $totalPrice }}€</td>
                @else
                    <td colspan="2"></td>
                    <td>Subtotal</td>
                    <td> {{ $totalPrice }}€</td>
                @endif    
            </tr>
        </tbody>
    </table>
</div>




@section('footer')
@endsection
@section('scripts')
@endsection
