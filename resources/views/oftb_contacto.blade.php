@extends('Layout.head');
@extends('Layout.navbar');
@extends('Layout.footer');
@extends('Layout.scripts');

@section('head')
<link rel="stylesheet" href="../css/css_plantilla.css">
<link rel="stylesheet" href="../css/css_contacto.css">
@endsection

@section('navbar')
@endsection

    <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 1-------------------------------->
    <!------------------------------------------------------------------->
    <div class="jumbotron jumbotron-fluid animate__animated animate__bounceInLeft bg-transparent">
        <div class="container mt-5">
            <h1 class="display-3 text-white animate__animated animate__bounceInLeft">Contact us</h1>
            <hr class="animate__animated animate__bounceInRight" style="background-color: red; height: 2px;"> 
        </div>
    </div>
    

    <div class="container text-center text-md-left text-white">
        <div class="row mt-5">
            <!--Imagen-->
            <div class="col-lg-6 col-md-12 div_img rounded">
            </div>
            <!--Contacto-->
            <div class="col-lg-3 col-md-6 col-sm-6 text-white p-4">
                <h6 class="text uppercase font-weight-bold">Contact</h6>
                <hr class="myhrfooter_contacto mb-4 mt-0 d-inline-block mx-auto">
                <ul class="list-unstyled">
                    <li class="my-2"><i class="fas fa-home mr-2"></i>C/Demostenes,32 Las Rozas</li>
                    <li class="my-2"><i class="fas fa-envelope mr-2"></i>juanjose.caviedes@gmail.com</li>
                    <li class="my-2"><i class="fa-solid fa-phone mr-2"></i>+34630529565</i></li>
                    <li class="my-2"><i class="fa-solid fa-location-dot mr-2"></i>Av.Europa,26</li>
                </ul>
            </div>

            <!--About-->
            <div class="col-lg-3 col-md-6 col-sm-6 text-white p-4">
                <h6 class="text uppercase font-weight-bold">About us</h6>
                <hr class="myhrfooter_aboutus mb-4 mt-0 d-inline-block mx-auto">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Rem dignissimos sed at id ipsam nesciunt beatae laborum praesentium asperiores in suscipit alias,
                    corrupti, excepturi non atque, nisi nemo porro dolores?</p>
            </div>
        </div>
    </div>

    


    <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 2-------------------------------->
    <!------------------------------------------------------------------->


    <div class="jumbotron jumbotron-fluid animate__animated animate__bounceInRight bg-transparent">
        <div class="container">
            <h1 class="display-3 text-white text-right animate__animated animate__bounceInRight">Where find us</h1>
            <hr class="animate__animated animate__bounceInLeft" style="background-color: red; height: 2px;"> 
        </div>
    </div>


    <!--Google Maps-->
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3036.539001589254!2d-3.7878275843505653!3d40.44120576207409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd41864fcbc2ca33%3A0x385660fe32fb55ee!2sAv.%20de%20Europa%2C%2026%2C%2028224%20Pozuelo%20de%20Alarc%C3%B3n%2C%20Madrid!5e0!3m2!1ses!2ses!4v1651070523430!5m2!1ses!2ses"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="mb-3"></iframe>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla adipisci eligendi culpa consectetur.
                    Aut, magnam explicabo laborum iste doloremque, at aperiam corrupti, commodi repudiandae aspernatur
                    laudantium. Optio ea quis assumenda!</p>

            </div>
            <div class="col-lg-6 col-md-6">
                <img class="text-center rounded" src="../Imagenes_OFTB/Imagenes_contacto/wfu_gow1.PNG" alt=""
                    style="height: 450px; ">
            </div>
        </div>
    </div>


@section('scripts')
@endsection

@section('footer')
@endsection


    

</body>

</html>