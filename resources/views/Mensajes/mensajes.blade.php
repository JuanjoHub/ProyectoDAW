@extends('Layout.head')
@section('head')
@endsection


{{-- Mensajes de error --}}

@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger text-left">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Mensaje de Cuenta creada exitosamente --}}
@if (session()->has('success'))
    <div class="alert alert-success text-center animate__animated animate__fadeInDown container">
        {{ session()->get('success') }}
    </div>
@endif

{{-- Mensaje producto añadido correctamente --}}
@if (session()->has('product'))
    <div class="alert alert-success text-center animate__animated animate__fadeInDown" style="margin-top:70px;">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('product') }}
    </div>
@endif

{{-- Mensaje producto borrado del carrito correctamente --}}
@if (session()->has('cart'))
    <div class="alert alert-success text-center animate__animated animate__fadeInDown">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('cart') }}
    </div>
@endif




{{-- @if ($errors->has('password'))
    <li class="list-unstyled mb-0"> {{ $errorPass }} </li>
@endif
@if ($errors->has('email'))
    <li class="list-unstyled mb-0"> {{ 'hola' }} </li>
@endif --}}



{{-- @if (Session::get('success', false))
    <?php //$data = Session::get('success');
    ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-success text-left">
                <i class="fa fa-check"></i>
                {{ $message }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success text-left">
            <i class="fa fa-check"></i>
            {{ $message }}
        </div>
    @endif
@endif --}}
