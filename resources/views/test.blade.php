<!DOCTYPE html>
<html>
<head>
<h1>¡ Pedido realizado con exito !</h1>
<h2>Resumen del pedido: </h2>

@foreach ($resume as $re )
    
    <img src="..{{$re->imagen}}" alt="">
    <p>Nombre del producto: {{$re->nombre_articulo}}</p>
    <p>Precio:{{$re->precio}}</p>

@endforeach

</body>
</html>

