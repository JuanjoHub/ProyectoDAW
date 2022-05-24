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
<div class="jumbotron jumbotron-fluid bg-transparent">
    <div class="container mt-5">
        <h1 class="display-4 text-white animate__animated animate__lightSpeedInLeft">Mis pedidos</h1>
    </div>
</div>

<!--PEDIDOS-->
<div class="container mb-5 ">
    <table class="table table-hover table-dark ">
        <thead class="titulos_pedidos">
            <tr>
                <th scope="col">Order date</th>
                <th scope="col">Order number</th>
                <th scope="col">Order status</th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <!--1 ROW-->

            @foreach ($mispedidos as $pedido)
                <form action="/detalles" method="POST">
                    @csrf
                    <tr class="cells_pedidos">
                        <input type="hidden" name="cod_pedido" value="{{ $pedido->cod_pedido }}">
                            <td>{{ $pedido->fecha_pedido }}</td>
                            <td>{{ $pedido->cod_pedido }}</td>
                            <td>{{ $pedido->estado }}</td>
                            <td>
                                <button type="submit" class="boton_detalles rounded-left rounded-right rounded-top">
                                    Order details
                                </button>
                            </td>

                    </tr>
                </form>
            @endforeach

        </tbody>
    </table>
</div>

<!------------------------------------------------------------------->
<!--------------------------PAGINATION------------------------------->
<!------------------------------------------------------------------->

<div class="container">
    <div class="d-flex justify-content-center">
        {{ $mispedidos->links() }}
    </div>
</div>

@section('footer')
@endsection
@section('scripts')
@endsection

</body>

</html>
