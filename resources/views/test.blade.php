@extends('Layout.head');
@extends('Layout.navbar');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
    <link rel="stylesheet" href="../css/css_pedidos.css">
@endsection

@section('navbar')
@endsection

<!------------------------------------------------------------------->
<!------------------------JUMBOTRON 1-------------------------------->
<!------------------------------------------------------------------->
<div class="jumbotron jumbotron-fluid jumbotron_orderMake jumbotron_hasbeen">
    <div class="container">
        <h1 class="display-4 text-white animate__animated animate__fadeInDown"> Order made successfully</h1>
    </div>
</div>


<!--Resumen de pedidos-->
<div class="container mb-5 ">
<h2 class="display-5 text-white animate__animated animate__lightSpeedInLeft">Resume</h2>
    <table class="table table-hover table-bordered bg-transparent ">
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
            @foreach ($orderResume as $resume)
                <tr>

                    <td>{{ $resume->product_title }}</td>
                    <td>{{ $resume->quantity }}</td>
                    <td>{{ $resume->price }}€</td>
                     <?php $totalAmount = $resume->quantity * $resume->price; ?>
                    <td>{{ $totalAmount }}€</td>
                     
                </tr>
            @endforeach
            <tr style=" font-weight: bold;">
                    <td colspan="2"></td>
                    <td>Subtotal</td>
                    <td> {{ $total }}€</td>
            </tr>
        </tbody>
    </table>
</div>



@section('footer')
@endsection
@section('scripts')
@endsection
