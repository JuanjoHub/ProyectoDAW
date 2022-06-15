@extends('Layout.head_verify')
@section('headVerify')
    <link rel="stylesheet" href="../css/css_registro.css">
@endsection
   


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
                        @include('Mensajes.mensajes')
                        <!--Nombre / email-->
                        <div class="form-row font-weight-bold">
                            <div class="form-group col-md-6 text-left">
                                <label>Username</label>
                                <input type="text" class="form-control text-white" name="username" id="inputEmail4" maxlength="25"
                                    placeholder="Nick name" value="{{ old('username') }}">
                            </div>
                            <div class="form-group col-md-6 text-left">
                                <label>Phone</label>
                                <input type="text" class="form-control text-white" name ="phone" id="inputPassword4"
                                    placeholder="+34630678930" value="{{ old('phone') }}">
                            </div>
                        </div>
 
                          <div class="text-left font-weight-bold mb-4">
                                <label>Email</label>
                                <input type="email" class="form-control text-white" name="email" id="inputPassword4"
                                    placeholder="peake_user@gmail.com" value="{{ old('email') }}">
                            </div>
                        <!--Contraseña / confirmacion contraseña-->
                        <div class="form-row font-weight-bold">
                            <div class="form-group col-md-6 text-left">
                                <label>Password</label>
                                <input type="password" class="form-control text-white" name="password" id="inputEmail4"
                                    placeholder="********">
                                   
                            </div>
                            <div class="form-group col-md-6 text-left mb-2">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control text-white" name ="password_confirmation" id="inputPassword4"
                                    placeholder="********">
                            </div>
                        </div>
                         <small class="form-text text-muted mt-0 mb-4">The password must contain at least 8 characters, a capital letter and a number.</small>
                       
                        

                        <button type="submit" value="Registrarse" class="btn btn-outline-danger btn-lg btn-block text-white font-weight-bold">
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
        var ancho = window.matchMedia("(max-width:1166px)");
        var alto = window.matchMedia("(max-height:200px)");
        var elefecto = document.getElementsByClassName("efecto");
        var divPrincipal = document.getElementById("test");

        ancho.addListener(doblediv_registro);
        alto.addListener(doblediv_registro);

    </script>

</body>

</html>
