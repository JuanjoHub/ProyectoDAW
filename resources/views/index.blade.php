<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Out of the box</title>

    <!--Links de nuestros CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/css_index.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/css_plantilla.css') !!}">

    <!--CSS animado-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body>

    <!------------------------------------------------------------------->
    <!--------------------------NAVBAR----------------------------------->
    <!------------------------------------------------------------------->

    <nav class="navbar navbar-expand-lg fixed-top navbar-drop" style="background: rgba(0, 0, 0, 0.5);">

        <a class="navbar-brand" href="/home">

            Out of the box
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-auto">

               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/home" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-search"></i>
                    </a>
                    {{-- ---- Barra de busqueda ---- --}}
                   <div class="dropdown-menu slideIn" aria-labelledby="navbarDropdown">
                        <form action="/home2" method='post' class="form mr-2 ml-2 form-group my-2 my-lg-0">
                            @csrf
                            <div class="d-flex">
                                <div>
                                    <input class="form-control " type="text" placeholder="Search" name="texto"
                                        value="{{ $texto="" }}">  <!-- Inicializamos la variable aqui para que no pete-->
                                </div>
                                <div>
                                    <input class="btn btn-danger ml-2" type="submit" value="Search">
                                </div>
                            </div>
                        </form>
                    </div> 
                    {{-- ------------------------- --}}
                </li>


                <li class="nav-item active">
                    <a class="nav-link" href="home">Home </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        Films
                    </a>
                    <div class="dropdown-menu slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Peliculas/esdla">The Lords Of The Rings</a>
                        <a class="dropdown-item" href="Peliculas/starwars">Star Wars</a>
                        <a class="dropdown-item" href="Peliculas/dc">DC</a>
                        <!--<div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="Peliculas/marvel">Marvel</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        Series
                    </a>
                    <div class="dropdown-menu slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Series/got">Game of thrones</a>
                        <a class="dropdown-item" href="Series/walkingdead">Walking Dead</a>
                        <a class="dropdown-item" href="Series/peakyblinders">Peaky Blinders</a>
                        <a class="dropdown-item" href="Series/theboys">The Boys</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        Videogames
                    </a>
                    <div class="dropdown-menu slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Videojuegos/mk">Mortal Kombat</a>
                        <a class="dropdown-item" href="Videojuegos/dmc">Devil May Cry</a>
                        <a class="dropdown-item" href="Videojuegos/gow">God Of War</a>
                        <a class="dropdown-item" href="Videojuegos/re">Resident Evil</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contacto">Contact</a>
                </li>
            </ul>
            <div class="text-center">
                {{-- ------------------------------------- --}}
                {{-- Si estas logeado visitando la pagina --}}
                {{-- ------------------------------------- --}}
                @auth

                    <ul class="navbar-nav mr-auto ml-auto">
                        {{-- Primer elemento --}}
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->username }}
                            </a>

                        </li>

                        <li class="nav-item mr-2">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-tie"></i>
                            </a>

                        </li>
                        {{-- Segundo elemento --}}

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-expanded="false">

                                <i class="fas fa-bars" style="color:#fff; font-size:28px; heigth"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right slideIn text-center"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/pedidos">Orders</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>

                    </ul>

                @endauth

                {{-- -------------------------------------------- --}}
                {{-- Si estas como invitado visitando la pagina --}}
                {{-- -------------------------------------------- --}}
                @guest

                    <ul class="navbar-nav mr-auto ml-auto">

                        <li class="nav-item mr-2">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-expanded="false">
                                Login
                            </a>
                            

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-expanded="false">

                                <i class="fas fa-bars" style="color:#fff; font-size:28px; heigth"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right slideIn text-center"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/login"></i>Sign in</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/registro">Sign up</a>
                            </div>
                        </li>
                    </ul>

                    {{-- <a href="login" class="text-white mr-2"><i class="fa-solid fa-user-tie mr-2 "></i>Sign in</a>
                    <a href="registro" class="text-white"><i class="fa-solid fa-address-card mr-2"></i>Sing up</a> --}}
                @endguest
            </div>
        </div>

    </nav>



    <!------------------------------------------------------------------->
    <!--------------------------CAROUSEL--------------------------------->
    <!------------------------------------------------------------------->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">


            <!--Primer slider-->
            <div class="carousel-item active"
                style="background-image:url(../Imagenes_OFTB/Imagenes_carrusel/sauron_carousel.jpg)">
                <div class="carousel-caption text-center mb-5 animate__animated animate__fadeInDown">
                    <h1>Welcome to Out of the Box</h1>
                    <h2>Top quality items</h2>
                    <a class="btn btn-outline-light btn-lg" href="oftb_peliculas_esdla.html">Check it</a>
                </div>
            </div>


            <!--Segundo slider-->
            <div class="carousel-item"
                style="background-image: url(../Imagenes_OFTB/Imagenes_carrusel/theboys_carousel.jpg);">
                <div class="carousel-caption text-center mb-5 animate__animated animate__fadeInDown">
                    <h1>Welcome to Out of the Box</h1>
                    <h2>Top quality items</h2>
                    <a class="btn btn-outline-light btn-lg" href="oftb_series_theboys.html">Check it</a>
                </div>
            </div>

            <!--Tercer slider-->
            <div class="carousel-item" style="background-image: url(../Imagenes_OFTB/Imagenes_carrusel/re2.jpg);">
                <div class="carousel-caption text-center mb-5 animate__animated animate__fadeInDown">
                    <h1>Welcome to Out of the Box</h1>
                    <h2>Top quality items</h2>
                    <a class="btn btn-outline-light btn-lg" href="oftb_juegos_re.html">Check it</a>
                </div>
            </div>
            <!--Final del carousel inner-->
            <!--Flecha del slider anterior-->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <!--Flecha del slider siguiente-->
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 1-------------------------------->
    <!------------------------------------------------------------------->
    <div class="jumbotron jumbotron-fluid bg-transparent mb-0">
        <div class="container">
            <h1 class="display-4 text-white animate__animated animate__bounce">New releases</h1>
        </div>
    </div>

 

    <!--CARTAS DE LAS ULTIMAS NOVEDADES-->
    <div class="container">
        <div class="row">
            @foreach ($articulos_a as $novedad)
                <div class="col-md-6 col-lg-4  col-sm-6 mb-4">
                    <div class="card p-3 text-right bg-transparent d-flex align-items-end"
                        style="border: none; background-image:url(..{{ $novedad->imagen }});">
                        <form action="/oftb_prev_prod" method="POST">
                            @csrf
                            <input type="hidden" name="cod_articulo" value="{{ $novedad->cod_articulo }}">
                            <button type="submit" class="boton_detalles rounded-left rounded-right rounded-top">
                                View Details
                            </button>
                        </form>
                    </div>
                    <blockquote class="blockquote mt-1">
                        <div class="d-flex justify-content-between">
                            <p>{{ $novedad->nombre_articulo }}</p>
                            <p class="font-weight-bold">{{ $novedad->precio }} €</p>
                        </div>
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>
    <!------------------------------------------------------------------->
    <!------------------------JUMBOTRON 2-------------------------------->
    <!------------------------------------------------------------------->

    <div class="jumbotron jumbotron-fluid bg-transparent mb-0">
        <div class="container">
            <h1 class="display-4 text-white">Bestselling</h1>
        </div>
    </div>
    
    <!--CARTAS DE PRODUCTOS MAS VENDIDOS-->
    <div class="container">
        <div class="row mb-2">
            @foreach ($articulos_b as $vendido)
                <div class="col-md-6 col-lg-4  col-sm-6 mb-4">
                    <div class="card p-3 text-right bg-transparent d-flex align-items-end"
                        style="border: none; background-image:url(..{{ $vendido->imagen }});">
                        <form action="/oftb_prev_prod" method="POST">
                            @csrf
                            <input type="hidden" name="cod_articulo" value="{{ $vendido->cod_articulo }}">
                            <button type="submit" class="boton_detalles rounded-left rounded-right rounded-top">
                                View Details
                            </button>
                        </form>
                    </div>
                    <blockquote class="blockquote mt-1">
                        <div class="d-flex justify-content-between">
                            <p>{{ $vendido->nombre_articulo }}</p>
                            <p class="font-weight-bold">{{ $vendido->precio }} €</p>
                        </div>
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>


    <!------------------------------------------------------------------->
    <!--------------------------FOOTER----------------------------------->
    <!------------------------------------------------------------------->

    <!--------------------------primera parte----------------------------------->
    <footer class="page-footer my2footer ">

        <div class="my2footer ">
            <div class="container">
                <div class="row py-4 d-flex align-items-center">
                    <div class="col-md-12 text-center">
                        <a href="#"><i class="fa-brands fa-facebook fa-3x mr-4 icon-red"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram fa-3x mr-4 icon-red"></i></a>
                        <a href="#"><i class="fa-brands fa-github fa-3x mr-4 icon-red"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin fa-3x mr-4 icon-red"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!--------------------------segunda parte----------------------------------->

        <div class="container text-center text-md-left mt-5 text-white ">
            <div class="row">

                <div class="col-md-4 mx-auto mb-4">
                    <h6 class="text uppercase font-weight-bold">Out of the box</h6>
                    <hr class="myhrfooter mb-4 mt-0 d-inline-block mx-auto" style="width: 115px; height: 2px;">
                    <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Doloremque porro veritatis accusamus magnam ab deserunt res molestias, autem placeat
                        laudantium cumque laborum ipsum.</p>
                </div>

                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text uppercase font-weight-bold">Products</h6>
                    <hr class="myhrfooter mb-4 mt-0 d-inline-block mx-auto" style="width: 70px; height: 2px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><a href="#" class="text-white">Peliculas</a></li>
                        <li class="my-2"><a href="#" class="text-white">Series</a></li>
                        <li class="my-2"><a href="#" class="text-white">Videojuegos</a></li>
                        <li class="my-2"><a href="#" class="text-white">Otros</a></li>
                    </ul>
                </div>

                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text uppercase font-weight-bold">Usefull links</h6>
                    <hr class="myhrfooter mb-4 mt-0 d-inline-block mx-auto" style="width: 95px; height: 2px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><a href="#" class="text-white">Home</a></li>
                        <li class="my-2"><a href="#" class="text-white">About</a></li>
                        <li class="my-2"><a href="#" class="text-white">Services</a></li>
                        <li class="my-2"><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-4 mx-auto mb-4">
                    <h6 class="text uppercase font-weight-bold">Contact</h6>
                    <hr class="myhrfooter mb-4 mt-0 d-inline-block mx-auto" style="width: 65px; height: 2px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><i class="fas fa-home mr-2"></i>C/Demostenes,32 Las Rozas</li>
                        <li class="my-2"><i
                                class="fas fa-envelope mr-2"></i>juanjose.cogollo.caviedes@gmail.com</li>
                        <li class="my-2"><i class="fa-solid fa-phone mr-2"></i>+34630529565</i></li>
                        <li class="my-2"><i class="fa-solid fa-location-dot mr-2"></i>Av.Europa,26</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--------------------------tercera parte----------------------------------->

        <div class="footer-copyright text-center py-3 my3footer">
            <p>&copy; Copyright
                <a href="#">outofthebox.com</a>
            </p>
            <p>Designed By: Juan Jose Cogollo Caviedes</p>
        </div>


    </footer>

    <!--
     <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                    </form>
-->


    <!--Estos Scrips los necesitamos para poder usar las funcionalidades del bootstrap-->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <!-- POPPER -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>



</body>

</html>
