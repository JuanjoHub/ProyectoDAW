@extends('navbar_footer');

<link rel="stylesheet" href="../css/css_pedidos.css">
<link rel="stylesheet" href="../css/css_plantilla.css">

@section('content')



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
                    <th scope="col">Fecha Pedido</th>
                    <th scope="col">Nº Pedido</th>
                    <th scope="col">Estado Pedido</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <!--1 ROW-->
                <tr class="cells_pedidos">
                    <th scope="row">25/04/2022</th>
                    <td>0001</td>
                    <td>Entregado</td>
                    <td>120,30€</td>
                </tr>
                <!--2 ROW-->
                <tr class="cells_pedidos">
                    <th scope="row">26/04/2022</th>
                    <td>0002</td>
                    <td>Entregado</td>
                    <td>199,99€</td>
                </tr>
                <!--3 ROW-->
                <tr class="cells_pedidos">
                    <th scope="row">30/04/2022</th>
                    <td>0003</td>
                    <td>En proceso</td>
                    <td>49,99€</td>
                </tr>
            </tbody>
        </table>
    </div>


 
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