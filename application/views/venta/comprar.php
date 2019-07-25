<?php

use MercadoPago\SDK;

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, mi.inimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>



    <!--SCRIPT PARA ALERT-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!-- MERCADOPAGO-->
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js">

    </script>

    <script>


        $(function() {
            var datosViaje = '<?php echo json_encode($datosViaje[0]); ?>';
            datosViaje = JSON.parse(datosViaje);
            console.log(datosViaje);
            var butacasElegidas = [];
            var tipoAsiento = "normal";
            var fechaViaje = "<?php echo $datos['fecha'] ?>";
            var origen = datosViaje.origen;
            var destino = datosViaje.destino;
            var PuntosDisponibles = '<?php echo $puntos[0]->getKmacumulados()?>';


            $(".badge-primary").click(function(e) {
                var valorPasaje = document.getElementById("tarifa").innerText;
                var valorPasajePuntos = valorPasaje * 2.5;
                if (parseInt(e.target.innerText)>=53){
                    valorPasaje = valorPasaje * 2;
                    tipoAsiento = "ejecutivo";
                } else if (parseInt(e.target.innerText)>=24 && parseInt(e.target.innerText)<=52){
                    var descuento = valorPasaje * 0.3;
                    valorPasaje = valorPasaje - descuento;
                    tipoAsiento = "promocional";
                }
                $.confirm({
                    title: 'Gracias por Elegirnos!',
                    content:
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Confirma la seleecion de asiento numero: '+e.target.innerText+'</label>' +
                        '<label>Valor del Pasaje: $'+valorPasaje+'</label>' +
                        '<label>Valor del Pasaje en Puntos: '+valorPasajePuntos+'</label>' +
                        '<label>Tipo de Asiento: '+tipoAsiento+'</label>' +
                        '<label>Ingrese el Nro de Dni:</label>'+
                        '<input type="text" placeholder="Ingrese Dni" id="dni" class="form-control" required />' +
                        '<label>Ingrese los Nombres:</label>'+
                        '<input type="text" placeholder="Ingrese Nombre" id="Nombres" class="name form-control" required />' +
                        '<label>Ingrese Apellido:</label>'+
                        '<input type="text" placeholder="Ingrese Apellido" id="Apellido" class="form-control" required />' +
                        '</div>' +
                        '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Confirmar Asiento',
                            btnClass: 'btn-blue',
                            action: function () {
                                var nombre = this.$content.find('#Nombres').val().trim();
                                var dni = this.$content.find('#dni').val().trim();
                                var apellido = this.$content.find('#Apellido').val().trim();
                                var butaca = e.target.innerText;
                                var idFrecuencia = datosViaje.idFrecuencia;
                                var idViaje = datosViaje.idViaje;
                                var metodoPago = "Tarjeta";

                                $("#ButacasElegidas").append("<tr>" +
                                                             "<td>"+nombre+"</td>"+
                                                             "<td>"+apellido+"</td>"+
                                                             "<td>"+dni+"</td>"+
                                                             "<td>"+e.target.innerText+"</td>"+
                                                             "<td>"+valorPasaje+"</td>"+
                                                             "<td>"+tipoAsiento+"</td>"+
                                                             "<td>"+metodoPago+"</td>"+
                                                             "</tr>");
                                $("#"+e.target.innerText+"").removeClass("badge-primary").addClass("badge-danger");

                                butacasElegidas.push({nombre, dni, apellido,butaca,valorPasaje,tipoAsiento, idFrecuencia, idViaje,fechaViaje, origen, destino,metodoPago});

                            }
                        },
                        cancel: function () {
                            //close
                        },

                        somethingElse: {
                            text: 'Confirmar Asiento Puntos',
                            btnClass: 'btn-blue',
                            keys: ['enter', 'shift'],
                            action: function(){
                                if(PuntosDisponibles>valorPasajePuntos){
                                var nombre = this.$content.find('#Nombres').val().trim();
                                var dni = this.$content.find('#dni').val().trim();
                                var apellido = this.$content.find('#Apellido').val().trim();
                                var butaca = e.target.innerText;
                                var idFrecuencia = datosViaje.idFrecuencia;
                                var idViaje = datosViaje.idViaje;
                                var metodoPago = "Puntos";

                                $("#ButacasElegidas").append("<tr>" +
                                    "<td>"+nombre+"</td>"+
                                    "<td>"+apellido+"</td>"+
                                    "<td>"+dni+"</td>"+
                                    "<td>"+e.target.innerText+"</td>"+
                                    "<td>"+valorPasaje+"</td>"+
                                    "<td>"+tipoAsiento+"</td>"+
                                    "<td>"+metodoPago+"</td>"+
                                    "</tr>");
                                $("#"+e.target.innerText+"").removeClass("badge-primary").addClass("badge-danger");

                                butacasElegidas.push({nombre, dni, apellido,butaca,valorPasaje,tipoAsiento, idFrecuencia, idViaje,fechaViaje, origen, destino,metodoPago});

                                } else {
                                    $.alert('No le Alcanza los Puntos para Comprar el Asiento pruebe con otro Metodo!');
                                }
                            }
                        }
                    }
                });
            });


            $('#ConfirmarCompra').click(function () {

                console.log(JSON.stringify(butacasElegidas));
                $("#DatosCompra").append("<input name='datos' value='" +
                    JSON.stringify(butacasElegidas) +
                    "'hidden>")

                $("#DatosCompra").submit();

            })
        });
    </script>
</head>
<body>

    <?php
    $butacas = [];
    foreach ($pasajes as $pasaje){
        $butacas[] = $pasaje->nroButaca;
    }

    ?>

<header class="fluid-container">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="../recursos/images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            PassageSystem
        </a>
    </nav>
</header>
<section class="container">
    <article>
            <div class="card text-center">
                <div class="card-header text-uppercase font-weight-bold">
                    Viaje Seleccionado
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div class="p-2 bd-highlight w-25">
                            <ul class="list-group">
                                <li class="list-group-item text-monospace font-weight-bold bg-info text-white">Ciudad Salida</li>
                                <li class="list-group-item text-monospace font-weight-bold bg-info text-white">Ciudad Destino</li>
                                <li class="list-group-item text-monospace font-weight-bold bg-info text-white">Fecha de Salida</li>
                                <li class="list-group-item text-monospace font-weight-bold bg-info text-white">Día de Salida</li>
                                <li class="list-group-item text-monospace font-weight-bold bg-info text-white">Tarifa Normal</li>
                            </ul>
                        </div>
                        <div class="p-2 bd-highlight w-25">
                            <ul class="list-group">
                                <li class="list-group-item"><?php echo $datosViaje[0]->origen ?></li>
                                <li class="list-group-item"><?php echo $datosViaje[0]->destino ?></li>
                                <li class="list-group-item"><?php echo $datos['fecha'] ?></li>
                                <li class="list-group-item"><?php echo $datosViaje[0]->hora ?></li>
                                <li class="list-group-item" id="tarifa"><?php echo $datosViaje[0]->tarifa ?></li>
                            </ul>
                        </div>
                        <div class="p-2 bd-highlight w-25">
                            <ul class="list-group">
                                <li class="list-group-item text-monospace font-weight-bold bg-info text-white">PUNTOS DISPONIBLES PARA COMPRAR</li>
                                <li class="list-group-item text-monospace font-weight-bold bg-info text-white"><?php echo $puntos[0]->getKmacumulados()?></li>
                            </ul>
                        </div>

                    </div>


                </div>
                <div class="card">
                    <h5 class="card-header text-uppercase font-weight-bold">REFERENCIAS</h5>
                    <div class="card-body">

                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-fill bd-highlight badge-primary">Disponible</div>
                            <div class="p-2 flex-fill bd-highlight badge-danger">No Disponible</div>
                            <div class="p-2 flex-fill bd-highlight bg-info text-white">Seleccionado</div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-muted d-flex">
                    <table class="table table-borderless w-25">
                        <thead class="thead-dark">
                        <tr>
                            <th colspan="4">PLANTA ALTA</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        if(empty($pasajes)){
                            $x = 1;
                            echo "<tr>";
                            for ($x;$x<$datosViaje[0]->capacidadSuperior+1;$x++){
                                if($x%4==0) {
                                    echo "<th class='badge-primary border border-light' id='$x'>";
                                    echo $x;
                                    echo "</th>";
                                    echo "</tr>";
                                } else {
                                    echo"<th class='badge-primary border border-light' id='$x'>";
                                    echo $x;
                                    echo"</th>";

                                }
                            }
                        } else {
                        $x = 1;
                        echo "<tr>";
                        for ($x;$x<$datosViaje[0]->capacidadSuperior+1;$x++){
                            if($x%4==0){
                                    if (in_array($x,$butacas)){
                                        echo"<th class='badge-danger border border-light' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                        echo"</tr>";
                                    } else {
                                        echo"<th class='badge-primary border border-light' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                        echo"</tr>";
                                    }
                                }

                            else {
                                if (in_array($x,$butacas)){
                                    echo"<th class='badge-danger border border-light' id='$x'>";
                                    echo $x;
                                    echo"</th>";
                                } else {
                                    echo"<th class='badge-primary border border-light' id='$x'>";
                                    echo $x;
                                    echo"</th>";
                                }
                            }

                        }
                        }
                        ?>
                        </tbody>
                    </table>


                    <table class="table table-borderless ml-3 w-25">
                        <thead class="thead-dark">
                        <tr>
                            <th colspan="4">PLANTA BAJA</th>
                        </tr>
                        </thead>
                        <tbody id="butacasbaja">
                        <?php
                        if(empty($pasajes)){
                            $x2 = 1;
                            echo "<tr>";
                            for ($x2;$x2<$datosViaje[0]->capacidadInferior+1;$x2++){

                                if($x2%3==0) {
                                    echo "<th class='badge-primary border border-light' id='$x'>";
                                    echo $x;
                                    echo "</th>";
                                    echo "</tr>";
                                } else {
                                    echo"<th class='badge-primary border border-light' id='$x'>";
                                    echo $x;
                                    echo"</th>";

                                }
                                $x++;
                            }
                        } else {
                            $x2 = 1;
                            echo "<tr>";
                            for ($x2;$x2<$datosViaje[0]->capacidadInferior+1;$x2++){

                                if($x2%3==0){
                                    if (in_array($x,$butacas)){
                                        echo"<th class='badge-danger border border-light' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                        echo"</tr>";
                                    } else {
                                        echo"<th class='badge-primary border border-light' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                        echo"</tr>";
                                    }

                                } else {

                                        if (in_array($x,$butacas)){
                                            echo"<th class='badge-danger border border-light' id='$x'>";
                                            echo $x;
                                            echo"</th>";
                                        } else {
                                            echo"<th class='badge-primary border border-light' id='$x'>";
                                            echo $x;
                                            echo"</th>";
                                        }

                                }
                                $x++;
                            }
                        }

                        ?>
                        </tbody>
                    </table>


                    <div class="card ml-3 w-75">
                        <h5 class="card-header text-uppercase font-weight-bold">Butacas Elegidas</h5>
                        <div class="card-body">
                            <table class="table table-striped table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Dni</th>
                                    <th scope="col">Nro Butaca</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Tipo Asiento</th>
                                    <th scope="col">Metodo Pago</th>
                                </tr>
                                </thead>
                                <tbody id="ButacasElegidas">

                                </tbody>
                            </table>
                        </div>

                        <form id="DatosCompra" action="/PassageSystem/index.php/Ventas/terminarCompra" method="Post">

                            <input type="button" class="btn btn-secondary btn-lg btn-block" name="ConfirmarCompra" id="ConfirmarCompra" value="Comprar">


                        </form>

                    </div>
                </div>
            </div>
    </article>
</section>


</body>
</html>