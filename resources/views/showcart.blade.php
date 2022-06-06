@extends('Layout.head');
@extends('Layout.navbar');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
    <link rel="stylesheet" href="../css/css_plantilla.css">
    <link rel="stylesheet" href="../css/css_pedidos.css">
@endsection

@section('standard_navbar')
    
@endsection


<!------------------------------------------------------------------->
<!------------------------JUMBOTRON 1-------------------------------->
<!------------------------------------------------------------------->
<div class="jumbotron jumbotron-fluid jumbotron_cart jumbotron_hasbeen">
    <div class="container mt-5">
        <h1 class="display-4 text-white animate__animated animate__lightSpeedInLeft ">Cart Results</h1>
    </div>
</div>

@include('Mensajes.mensajes') 
<!--Carrito-->

@if ($userCart->isEmpty())


<div class="container mb-5 text-center">
    <h2 class="text-white"> Ups, the cart is empty! </h2>
    <img src="../Imagenes_OFTB/Imagenes/empty_safe.jpg" class="img-fluid" alt="">
</div>    
@else
    


<div class="container mb-5 ">
    <table class="table table-hover table-dark table-bordered ">
        <thead class="titulos_pedidos">
            <tr>
                <th scope="col">Product Title</th>
                <th scope="col">Amount</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <!--1 ROW-->
            <?php $totalPrice = 0; ?>
            @foreach ($userCart as $cart)
                <tr>

                    <td>{{ $cart->product_title }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ $cart->price }}€</td>
                    <?php $total = $cart->quantity * $cart->price; ?>
                    <td>{{ $total }}€</td>
                    
                    <td class="text-center">
                         <i class="fa-solid fa-trash-can fa-lg mt-2 btn" onclick="seleccionarAbrirModal( {{$cart->id}} )"></i>
                    </td>
                    <?php $totalPrice = $totalPrice + $total; ?>
                </tr>
            @endforeach
            <tr style=" font-weight: bold;">

                <td colspan="2"></td>
                <td>Subtotal</td>
                <td> {{ $totalPrice }}€</td>
                <td class="text-center"><a name="" class="btn btn-success" href="/pago" role="button">Buy now</a>
                </td>

            </tr>

        </tbody>
    </table>
</div>

@endif
<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modalBody">
            <div class="modal-body">
                Are you sure you wanna delete this article?
                
            </div>
            <div class="modal-footer">
                <button type="button" onclick= "limpiarIdBorrado()" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" onclick= "borrarDeCarrito()" class="btn btn-success">Delete Article</button>
            </div>
        </div>
    </div>
</div>

<script>

    let idBorrado = "";
    const urlBorrado = "{{ url('delete', '') }}";

    function seleccionarAbrirModal(id) {
        idBorrado = id;
        $('#cartModal').modal({
            show: true
        })
    }

    function borrarDeCarrito() {
      window.location.href = urlBorrado + '/' +  idBorrado.toString();
    }

    function limpiarIdBorrado() {
      idBorrado = "";

    }
</script>

@section('scripts')
@endsection
@section('footer')
@endsection
