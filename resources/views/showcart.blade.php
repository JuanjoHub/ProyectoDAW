@extends('Layout.head');
@extends('Layout.navbar');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
<link rel="stylesheet" href="../css/css_plantilla.css">
<link rel="stylesheet" href="../css/css_pedidos.css">
@endsection

@section('navbar')  
@endsection

 <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 1-------------------------------->
    <!------------------------------------------------------------------->
    <div class="jumbotron jumbotron-fluid bg-transparent">
        <div class="container mt-5">
            <h1 class="display-4 text-white animate__animated animate__lightSpeedInLeft">Cart Results</h1>
        </div>
    </div>

    
<!--Carrito-->
<div class="container mb-5 ">
    <table class="table table-hover table-dark table-bordered ">
        <thead class="titulos_pedidos">
            <tr>
                <th scope="col">Product Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <!--1 ROW-->
             <?php $totalPrice = 0 ?>
            @foreach ($userCart as $cart)
                <tr>

                    <td>{{ $cart->product_title }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ $cart->price }}€</td>
                    <?php $total = $cart->quantity * $cart->price; ?>
                    <td>{{ $total }}€</td>
                    <td class="text-center"> <a href="{{url('delete',$cart->id)}}"><i class="fa-solid fa-trash-can fa-lg mt-2"></i></a></td>
                    <?php $totalPrice = $totalPrice + $total; ?>
                </tr>
            @endforeach
            <tr style=" font-weight: bold;">
             
                    <td colspan="2"></td>
                    <td>Subtotal</td>
                    <td> {{ $totalPrice }}€</td>
                     <td class="text-center"><a name="" class="btn btn-primary" href="/pago" role="button">Buy now</a></td>
               
            </tr>
        </tbody>
    </table>
</div>



@section('scripts')
@endsection
@section('footer')
@endsection