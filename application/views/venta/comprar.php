<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, mi.inimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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


            $(".badge-primary").click(function(e) {

                $.confirm({
                    title: 'Gracias por Elegirnos!',
                    content: '' +
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Confirma la seleecion de asiento numero: '+e.target.innerText+'</label>' +
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
                            text: 'Submit',
                            btnClass: 'btn-blue',
                            action: function () {
                                var nombre = this.$content.find('#Nombres').val().trim();
                                var dni = this.$content.find('#dni').val().trim();
                                var apellido = this.$content.find('#Apellido').val().trim();


                                $("#ButacasElegidas").append("<tr>" +
                                                             "<td>"+nombre+"</td>"+
                                                             "<td>"+apellido+"</td>"+
                                                             "<td>"+dni+"</td>"+
                                                             "<td>"+e.target.innerText+"</td>"+
                                                             "</tr>");
                                $("#"+e.target.innerText+"").removeClass("badge-primary").addClass("badge-danger");


                            }
                        },
                        cancel: function () {
                            //close
                        },
                    },
                    onContentReady: function () {
                        // bind to events
                        var jc = this;
                        this.$content.find('form').on('submit', function (e) {
                            // if the user submits the form by pressing enter in the field.
                            e.preventDefault();
                            jc.$$formSubmit.trigger('click'); // reference the button and click it
                        });
                    }
                });
            });
        });
    </script>
</head>

<body>
<header class="fluid-container">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="../recursos/images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            PassageSystem
        </a>
    </nav>
</header>
<section class="container">

    <?php
    print_r($pasajes);
    ?>
    <article>
            <div class="card text-center">
                <div class="card-header">
                    Viaje Seleccionado
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="p-2 bd-highlight w-25">
                            <ul class="list-group">
                                <li class="list-group-item">Ciudad Salida</li>
                                <li class="list-group-item">Ciudad Destino</li>
                                <li class="list-group-item">Fecha de Salida</li>
                                <li class="list-group-item">Día de Salida</li>
                                <li class="list-group-item">Tarifa Normal</li>
                            </ul>
                        </div>
                        <div class="p-2 bd-highlight w-25">
                            <ul class="list-group">
                                <li class="list-group-item"><?php echo $datosViaje[0]->origen ?></li>
                                <li class="list-group-item"><?php echo $datosViaje[0]->destino ?></li>
                                <li class="list-group-item"><?php echo $datos['fecha'] ?></li>
                                <li class="list-group-item"><?php echo $datosViaje[0]->hora ?></li>
                                <li class="list-group-item"><?php echo $datosViaje[0]->tarifa ?></li>
                            </ul>
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
                        $x = 1;
                        echo "<tr>";
                        for ($x;$x<$datosViaje[0]->capacidadSuperior+1;$x++){
                            if($x%4==0){
                                foreach ($pasajes as $pasaje){
                                    if ($pasaje->nroButaca == $x){
                                        echo"<th class='badge-danger' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                        echo"</tr>";
                                    } else {
                                        echo"<th class='badge-primary' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                        echo"</tr>";
                                    }
                                }


                            } else {
                                foreach ($pasajes as $pasaje){
                                    if ($pasaje->nroButaca == $x){
                                        echo"<th class='badge-danger' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                    } else {
                                        echo"<th class='badge-primary' id='$x'>";
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
                        $x2 = 1;
                        echo "<tr>";
                        for ($x2;$x2<$datosViaje[0]->capacidadInferior+1;$x2++){
                            $x++;
                            if($x2%3==0){
                                foreach ($pasajes as $pasaje){
                                    if ($pasaje->nroButaca == $x){
                                        echo"<th class='badge-danger' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                        echo"</tr>";
                                    } else {
                                        echo"<th class='badge-primary' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                        echo"</tr>";
                                    }
                                }
                            } else {
                                foreach ($pasajes as $pasaje){
                                    if ($pasaje->nroButaca == $x){
                                        echo"<th class='badge-danger' id='$x' disabled>";
                                        echo $x;
                                        echo"</th>";
                                    } else {
                                        echo"<th class='badge-primary' id='$x'>";
                                        echo $x;
                                        echo"</th>";
                                    }
                                }
                            }

                        }
                        ?>
                        </tbody>
                    </table>

                    <div class="card ml-3 w-50">
                        <h5 class="card-header">Butacas Elegidas</h5>
                        <div class="card-body">
                            <table class="table table-striped table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Dni</th>
                                    <th scope="col">Nro Butaca</th>
                                </tr>
                                </thead>
                                <tbody id="ButacasElegidas">

                                </tbody>
                            </table>
                        </div>
                        <form id="compra" action="/PassageSystem/index.php/Ventas/terminarCompra" method="POST">
                            <script
                                    src="https://www.mercadopago.com.ar/integrations/v1/web-tokenize-checkout.js"
                                    data-public-key="TEST-797de73b-42fa-44ab-a5ea-84e92651dbcb"
                                    data-transaction-amount="300">
                            </script>
                        </form>
                    </div>
                </div>
            </div>
    </article>
</section>
<?php
print_r($datosViaje);
?>
</body>
</html>