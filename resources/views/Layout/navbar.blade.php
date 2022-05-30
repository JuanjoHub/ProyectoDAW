    <body style="margin-top: -24px;">
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
                                            value="{{ $texto = '' }}">
                                        <!-- Inicializamos la variable aqui para que no pete-->
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
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
                <div class="text-center">
                    {{-- ------------------------------------- --}}
                    {{-- Si estas logeado visitando la pagina --}}
                    {{-- ------------------------------------- --}}
                    @auth

                        <ul class="navbar-nav mr-auto ml-auto">

                            {{-- Carrito --}}
                            <li class="nav-item mt-1">
                                <div class="d-flex bd-highlight">
                                    <div class="flex-fill bd-highligh">
                                        <a class="nav-link" href="/showcart" >
                                            <i class="fa-solid fa-cart-shopping">
                                            </i>
                                        </a>
                                    </div>
                                     <div class="divNumCarrito">
                                        <div class="divNumero">
                                            <p>{{ $quantityCard }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            {{-- Usuario --}}
                            <li class="nav-item mr-2 text-left">
                                <a class="nav-link" href="#">
                                    {{ auth()->user()->username }}
                                </a>

                            </li>
                            {{-- Icono de logeado corecctamente --}}
                            <li class="nav-item mt-1 mr-1 text-left">
                                <a class="nav-link" href="#">
                                    <i class="fa-solid fa-user-check"></i>
                                </a>

                            </li>

                            {{-- Dropdowns del toggle --}}
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
        @yield('standard_navbar')
