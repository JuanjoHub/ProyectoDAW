<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Out of the box</title>
    <link rel="stylesheet" href="../css/css_registro.css">
    <link rel="stylesheet" href="../css/css_pago.css">


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
            <div class="container div_form">
                <!--Formulario-->
                <form>
                    <!--Nombre / email-->
                    <div class="form-row font-weight-bold mb-2">
                        <div class="col-md-12 text-left mb-3">
                            <h2>Dirección de facturación</h2>
                        </div>
                        <div class="form-group col-md-6 text-left">
                            <!--Nombre completo-->
                            <input type="text" class="form-control text-white" id="inputEmail4"
                                placeholder="Nombre destinatario">
                        </div>
                        <!--Dirección de facturación-->
                        <div class="form-group col-md-6 text-left">
                            <input type="text" class="form-control text-white" id="inputPassword4"
                                placeholder="Dirección de facturación">
                        </div>
                    </div>

                    <select class="custom-select custom-select-lg mb-3">
                        <option selected>Comunidad Autonoma</option>
                        <option value="1">Galicia</option>
                        <option value="2">Asturias</option>
                        <option value="3">Cantabria</option>
                        <option value="5">País Vasco</option>
                        <option value="6">Navarra</option>
                        <option value="7">La Rioja</option>
                        <option value="8">Aragón</option>
                        <option value="9">Cataluña</option>
                        <option value="10">Castilla y león</option>
                        <option value="11">Madrid</option>
                        <option value="12">Castilla-La Mancha</option>
                        <option value="13">Comunidad Valenciana</option>
                        <option value="14">Extremadura</option>
                        <option value="15">Andalucía</option>
                        <option value="16">Región de Murcia</option>
                    </select>



                    <!--Metodo de pago-->


                    <h2 class="text-left mb-4">Método de pago</h2>


                    <div class="custom-control custom-radio mb-4 col-md-11">
                        <input type="radio" id="customRadio1" name="customRadio1" class="custom-control-input">
                        <label class="custom-control-label d-flex justify-content-start ml-4" for="customRadio1">Tarjeta
                            crédito/débito </label>
                        <i class="fa-brands fa-cc-visa fa-lg fa-xl d-flex justify-content-end"></i>
                    </div>

                    <div class="custom-control custom-radio mb-4 col-md-11">
                        <input type="radio" id="customRadio2" name="customRadio2" class="custom-control-input">
                        <label class="custom-control-label d-flex justify-content-start ml-4"
                            for="customRadio1">Paypal</label>
                        <i class="fa-brands fa-cc-paypal fa-xl d-flex justify-content-end"></i>
                        
                    </div>

                    <div class="custom-control custom-radio mb-4 col-md-11">
                        <input type="radio" id="customRadio3" name="customRadio3" class="custom-control-input">
                        <label class="custom-control-label d-flex justify-content-start ml-4" for="customRadio1">Apple
                            Pay</label>
                        <i class="fa-brands fa-cc-apple-pay fa-xl d-flex justify-content-end"></i>
                    </div>

                    <div class="text-left font-weight-bold">
                        <!--Numero de la tarjeta-->
                        <label for="inputEmail4">Número de tarjeta</label>
                        <input type="text" class="form-control text-white mb-3" id="inputCard"
                            placeholder="**** **** **** ****">
                        <!--Titular de la tarjeta-->
                        <label for="inputPassword4">Titular de la tarjeta</label>
                        <input type="text" class="form-control text-white mb-3" id="inputPassword4"
                            placeholder="Andrea Vicente Hernandez">
                    </div>


                    <!--Fecha de nacimiento / telefono-->
                    <div class="form-row font-weight-bold text-left">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Fecha de caducidad </label>
                            <input type="text" class="form-control text-white text-white" id="inputEmail4"
                                placeholder="MM/YY">
                        </div>
                        <div class="form-group col-md-6 text-left">
                            <label for="inputPassword4">CVV</label>
                            <input type="text" class="form-control text-white" id="inputPassword4"
                                placeholder="CVC">
                        </div>
                    </div>

                    <!--Boton del submit-->
                    <button type="submit" class="btn btn-lg btn-block text-white font-weight-bold">
                        Pagar cantidad
                    </button>

                </form>
                    <!--Enlace para ir al login-->
                    <div class="p-4"> <a href="oftb_prev_prod.html"><i class="fa-solid fa-angles-left mr-2 "></i>Back</a>
                    </div>

            </div><!--Div que cierra el div container-->

           
            
        </div><!--Div que cierra el div izquierdo-->



        <!----------------------------------------------------------------------->
        <!------------------DIV DERECHO que contiene la imagen------------------->
        <!----------------------------------------------------------------------->

        <div class="right_img">

            <div class="d-flex align-items-end flex-column " style="height: 150px;">
                <div class="p-4"> <a href="index.html"><i class="fa-solid fa-xmark fa-3x"></i></a>
                </div>
            </div>

            <div class="container">
               
                        <img src="../Imagenes_OFTB/Imagenes_compra/negan_pago_buena.jpg" alt="" class="mx-auto d-block img-fluid rounded d-md-none d-lg-block">
              
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
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!-- POPPER -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>