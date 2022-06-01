@extends('Layout.head');
@extends('Layout.navbar');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
    <link rel="stylesheet" href="../css/css_pedidos.css">
    <link rel="stylesheet" href="../css/css_plantilla.css">
@endsection

@section('navbar')
@endsection


<!------------------------------------------------------------------->
<!------------------------JUMBOTRON 1-------------------------------->
<!------------------------------------------------------------------->
<div class="jumbotron jumbotron-fluid jumbotron_letter">
    <div class="container mt-5">
        <h1 class="display-4 text-white animate__animated animate__lightSpeedInLeft">Orders</h1>
    </div>
</div>

<!--PEDIDOS-->
<div class="container mb-4 mt-5">
    <table class="table table-hover table-striped table-dark table-borderless ">
        <thead class="titulos_pedidos">
            <tr>
                <th scope="col" style="width:250px;">Order date</th>
                <th scope="col" style="width:250px;">Order number</th>
                <th scope="col" style="width:250px;">Order status</th>
                <th scope="col" style="width:100px;">Details</th>
            </tr>
        </thead>
        <tbody>
            <!--1 ROW-->
            @foreach ($mispedidos as $pedido)
                <form action="/detalles" method="POST">
                    @csrf
                    <tr class="cells_pedidos">
                        <input type="hidden" name="pedido_id" value="{{ $pedido->pedido_id }}">
                            <td>{{ $pedido->fecha_pedido }}</td>
                            <td>{{ $pedido->pedido_id }}</td>
                            <td>{{ $pedido->estado }}</td>
                            <td>
                                <button type="submit" class="btn btn-danger rounded-left rounded-right rounded-top">
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

<div class="container mb-3">
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
