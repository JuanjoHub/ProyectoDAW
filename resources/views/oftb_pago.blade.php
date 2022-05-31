@extends('Layout.head_verify')
@section('headVerify')
    <link rel="stylesheet" href="../css/css_registro.css">
    <link rel="stylesheet" href="../css/css_pago.css">
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
            <div style="height: 60px;">
            </div>
            <div class="container">
                <!--Formulario-->
                <form action="/pago_realizado" method="POST">
                    @csrf
                     @include('Mensajes.mensajes')
                    <input type="hidden" name="cod_pago" value="{{ $cod_pago }}">
                    <!-- Pasamos el codigo en un tipo hidden al siguiente controlador-->
                    <!--Nombre / email-->
                    <div class="form-row font-weight-bold mb-2">
                        <div class="col-md-12 text-left mb-3">
                            <h2>Billing Details</h2>
                        </div>
                        <div class="form-group col-md-6 text-left">
                            <!--Nombre completo-->
                            <input type="text" class="form-control text-white" id="nombre" name="nombre"
                                placeholder="Name" value="{{ old('nombre') }}">
                        </div>
                        <!--Dirección de facturación-->
                        <div class="form-group col-md-6 text-left">
                            <input type="text" class="form-control text-white" id="direccion" name="direccion"
                                placeholder="Address" value="{{ old('direccion') }}">
                        </div>
                    </div>

                    <select class="custom-select custom-select-lg mb-3" name="ccaa">
                        <option selected>Region</option>
                        <option value="Galicia" {{ old('ccaa') == "Galicia" ? 'checked' : '' }}>Galicia</option>
                        <option value="Asturias">Asturias</option>
                        <option value="Cantabria">Cantabria</option>
                        <option value="Pais Vasco">País Vasco</option>
                        <option value="Navarra">Navarra</option>
                        <option value="La Rioja">La Rioja</option>
                        <option value="Aragon">Aragón</option>
                        <option value="Catalunia">Cataluña</option>
                        <option value="Castilla y Leon">Castilla y León</option>
                        <option value="Madrid">Madrid</option>
                        <option value="Castilla La Mancha">Castilla La Mancha</option>
                        <option value="Comunidad Valenciana">Comunidad Valenciana</option>
                        <option value="Extremadura">Extremadura</option>
                        <option value="Andalucia">Andalucía</option>
                        <option value="Region de Murcia">Región de Murcia</option>
                    </select>

                    <!--Metodo de pago-->

                    <h2 class="text-left mb-4">Payment Method</h2>

                    {{-- ----------------------------------------------------------------------------------------------- --}}
                    <div class="custom-control custom-radio mb-4 col-md-11">
                        <input type="radio" id="customRadio1" name="metodo" class="custom-control-input" value="Visa" {{ old('metodo') == "Visa" ? 'checked' : '' }}>
                        <label class="custom-control-label d-flex justify-content-start ml-4" for="customRadio1">Credit/Debit Card </label>
                        <i class="fa-brands fa-cc-visa fa-lg fa-xl d-flex justify-content-end"></i>
                    </div>

                    <div class="custom-control custom-radio mb-4 col-md-11">
                        <input type="radio" id="customRadio2" name="metodo" class="custom-control-input" value="Paypal" {{ old('metodo') == "Paypal" ? 'checked' : '' }}>
                        <label class="custom-control-label d-flex justify-content-start ml-4"
                            for="customRadio2">Paypal</label>
                        <i class="fa-brands fa-cc-paypal fa-xl d-flex justify-content-end"></i>

                    </div>

                    <div class="custom-control custom-radio mb-4 col-md-11">
                        <input type="radio" id="customRadio3" name="metodo" class="custom-control-input" value="Apple" {{ old('metodo') == "Apple" ? 'checked' : '' }}>
                        <label class="custom-control-label d-flex justify-content-start ml-4" for="customRadio3">Apple Pay</label>
                        <i class="fa-brands fa-cc-apple-pay fa-xl d-flex justify-content-end"></i>
                    </div>

                    <div class="text-left font-weight-bold">
                        <!--Numero de la tarjeta-->
                        <label>Card Number</label>
                        <input type="text" class="form-control text-white mb-3" id="inputCard" name="tarjeta"
                            placeholder="**** **** **** ****" value="{{ old('tarjeta') }}">
                        <!--Titular de la tarjeta-->
                        <label>Card Holder</label>
                        <input type="text" class="form-control text-white mb-3" name="titular"
                            placeholder="Andrea Vicente Hernandez" value="{{ old('titular') }}">
                    </div>

                    <h2 class="text-left mb-3">Expiration Date</h2>
                    <!--Fecha de caducidad / cvv-->
                    <div class="form-row font-weight-bold text-left">
                   
                        <div class="form-group col-md-3">
                            <label>Month</label>
                            <select class="custom-select custom-select-md mb-3" name="month" required value="{{ old('month') }}">
                                @for ($i = 1; $i < 13; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        {{-- YEAR --}}
                        <div class="form-group col-md-3 text-left">

                        <label for="inputPassword4">Year</label>
                            <?php $current_year = date('Y'); ?>
                            <select class="custom-select custom-select-md mb-3" name="year" required value="{{ old('year') }}">
                                <option selected="1">{{ $current_year }}</option>
                                @for ($i = 1; $i < 6; $i++)
                                    <option value="{{ $i }}">{{ $current_year + $i }}</option>
                                @endfor
                            </select>
                        </div>


                        {{-- ----------------- CVC --------------------- --}}
                        <div class="form-group col-md-6 text-left">
                            <label for="inputPassword4">CVC</label>
                            <input type="text" class="form-control text-white" id="inputPassword4" placeholder="CVC"
                                name="cvc" maxlength="3" value="{{ old('cvc') }}">
                        </div>
                    </div>



                    <!--Boton del submit-->
                    <button type="submit" class="btn btn-lg btn-block text-white font-weight-bold">
                        Total {{$total}}€
                    </button>

                </form>
                <!--Enlace para ir al login-->
                <div class="p-4"> <a href="/home"><i class="fa-solid fa-angles-left mr-2 "></i>Back</a>
                </div>

            </div>
            <!--Div que cierra el div container-->



        </div>
        <!--Div que cierra el div izquierdo-->



        <!----------------------------------------------------------------------->
        <!------------------DIV DERECHO que contiene la imagen------------------->
        <!----------------------------------------------------------------------->

        <div class="right_payment bg-dark">

            <div class="d-flex align-items-end flex-column">
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
        var ancho = window.matchMedia("(max-width:1300px)");
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
