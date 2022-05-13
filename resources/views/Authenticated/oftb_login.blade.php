<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="../css/css_login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>

<body>

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

                    <div class="form-group text-left font-weight-bold">
                        <label>Username / Email</label>
                        <input type="text" class="form-control text-white" name="username" id="exampleFormControlInput1"
                            placeholder="peakeblinder@example.com">
                    </div>
                    <div class="form-group text-left mb-5 font-weight-bold">
                        <label>Password</label>
                        <input type="password" class="form-control text-white" name="password"
                            id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-lg btn-block text-white font-weight-bold" value="Login">
                        SIGN IN
                    </button>

                </form>
            </div>

            <!--Enlace para ir al registro-->
            <div class="p-4"> <a href="/registro" class="text-white"><i
                        class="fa-solid fa-user-tie fa-lg mr-3 icon_color"></i>Create account</a>
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
                console.log("Entro en el if");
            } else {
                divPrincipal.classList.remove("efecto");
            }
        }
        var ancho = window.matchMedia("(max-width:1050px)");
        var alto = window.matchMedia("(max-height:200px)");
        var elefecto = document.getElementsByClassName("efecto");
        var divPrincipal = document.getElementById("test");

        ancho.addListener(doblediv_login);
        alto.addListener(doblediv_login);
    </script>



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
