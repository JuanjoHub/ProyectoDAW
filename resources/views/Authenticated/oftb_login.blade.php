<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>

<body>
<title>Login</title>
    <link rel="stylesheet" href="../css/css_login.css">
    <!----------------------------------------------------------------------->
    <!--DIV CONTENEDOR contiene los otros 2 divs que van formar esta pagina-->
    <!----------------------------------------------------------------------->

    <div class="container-halfs" id="test">

        <!----------------------------------------------------------------------->
        <!-----------------DIV IZQUIERDO que contiene el form-------------------->
        <!----------------------------------------------------------------------->

        <div class="left text-white text-center">

            <div style="height: 130px;">
            </div>

            <div class="container mt-5">

                <div class="div_logo1">
                    <img src="../Imagenes_OFTB/Logos/Logo_OFTB_gris2.PNG" alt="Logo">
                </div>
                <!----------------------------------------------------------------------->
                <!---------------------------Formulario---------------------------------->
                <!----------------------------------------------------------------------->
                <form action="/login" method="POST">
                    @csrf

                    @include('Mensajes.mensajes')
                    
                    {{-- Username / Email --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-white" id="floatingInput" placeholder="name@example.com" name="username" value="{{ old('username') }}">
                        <label for="floatingInput">Username/Email</label>
                    </div>
                    {{-- Password --}}
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control text-white" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    
                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-danger text-white font-weight-bold" style="font-weight: bold;" value="Login">SIGN IN</button>

                    </div>
                       
                </form>
            </div>

            <!--Enlace para ir al registro-->
            <div class="p-4"> 
            <a href="/registro" class="text-white" style="font-weight: bold;">Create account</a>
            </div>

        </div>

        <!----------------------------------------------------------------------->
        <!------------------DIV DERECHO que contiene la imagen------------------->
        <!----------------------------------------------------------------------->

        <div class="right">
            <div class="d-flex align-items-end flex-column " style="height: 150px;">
                <div class="p-4"> <a href="/home"><i class="fa-solid fa-xmark fa-3x icon_color"></i></a>
                </div>
            </div>
        </div>
    </div>



    <script>
        function doblediv_login() {

            if (ancho.matches || alto.matches) {
                divPrincipal.classList.add("efecto");
                
            } else {
                divPrincipal.classList.remove("efecto");
            }
        }
        var ancho = window.matchMedia("(max-width:1059px)");
        var alto = window.matchMedia("(max-height:200px)");
        var elefecto = document.getElementsByClassName("efecto");
        var divPrincipal = document.getElementById("test");

        ancho.addListener(doblediv_login);
        alto.addListener(doblediv_login);
    </script>


    {{-- Bootstrap 5 --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
