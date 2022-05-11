<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Out of the box</title>
    <link rel="stylesheet" href="../css/css_registro.css">


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
            <!--Div para fijar la altura del formulario-->
            <div style="height: 100px;">
            </div>
            <div class="container">

                <!--Div que va a contener el logo y el formulario-->

                <div>
                    <!--Logo-->
                    <div class="div_logo1 mt-5">
                        <img src="../Imagenes_OFTB/Logos/Logo_OFTB_gris2.PNG" alt="Logo">
                    </div>
                    <!----------------------------------------------------------------------->
                    <!---------------------------Formulario---------------------------------->
                    <!----------------------------------------------------------------------->
                    <form action="/registro" method="POST">
                        @csrf <!-- Agrega nuetro campo oculto para poder utilizar nuestro token y evitar problemas de seguridad-->

                        <!--Nombre / email-->
                        <div class="form-row font-weight-bold mb-2">
                            <div class="form-group col-md-6 text-left">
                                <label>Name</label>
                                <input type="text" class="form-control text-white" name="nombre_usuario" id="inputEmail4"
                                    placeholder="Nick name">
                            </div>
                            <div class="form-group col-md-6 text-left">
                                <label>Email</label>
                                <input type="email" class="form-control text-white" name="email" id="inputPassword4"
                                    placeholder="peake_user@gmail.com">
                            </div>
                        </div>
                        <!--Contraseña / confirmacion contraseña-->
                        <div class="form-row font-weight-bold mb-2">
                            <div class="form-group col-md-6 text-left">
                                <label>Password</label>
                                <input type="password" class="form-control text-white" name="password" id="inputEmail4"
                                    placeholder="Password">
                            </div>
                            <div class="form-group col-md-6 text-left mb-2">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control text-white" name ="password_confirmation" id="inputPassword4"
                                    placeholder="Password">
                            </div>
                        </div>
                        <!--Fecha de nacimiento / telefono-->
                        <div class="form-row font-weight-bold text-left">
                            <div class="form-group col-md-6">
                                <label>Fecha de nacimiento </label>
                                <input type="date" class="form-control text-white text-white" name ="fecha_nacimiento" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6 text-left">
                                <label>Phone</label>
                                <input type="text" class="form-control text-white" name ="telefono" id="inputPassword4"
                                    placeholder="+34630678930">
                            </div>
                        </div>

                        <button type="submit" value="Registrarse" class="btn btn-lg btn-block text-white font-weight-bold">
                            SIGN UP
                        </button>
                    </form>
                </div>
            </div>

            <!--Enlace para ir al login-->
            <div class="p-4"> <a href="/home"><i class="fa-solid fa-angles-left mr-2"></i>Back</a>
            </div>

        </div>

        <!----------------------------------------------------------------------->
        <!------------------DIV DERECHO que contiene la imagen------------------->
        <!----------------------------------------------------------------------->

        <div class="right">

            <div class="d-flex align-items-end flex-column " style="height: 150px;">
                <div class="p-4"> <a href="/home"><i class="fa-solid fa-xmark fa-3x"></i></a>
                </div>
            </div>

        </div>
    </div>



    <script>
        function doblediv_registro() {

            if (ancho.matches || alto.matches) {
                divPrincipal.classList.add("efecto");
                console.log("Entro en el if");


            } else {
                divPrincipal.classList.remove("efecto");
            }

        }
        var ancho = window.matchMedia("(max-width:1100px)");
        var alto = window.matchMedia("(max-height:200px)");
        var elefecto = document.getElementsByClassName("efecto");
        var divPrincipal = document.getElementById("test");

        ancho.addListener(doblediv_registro);
        alto.addListener(doblediv_registro);
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
