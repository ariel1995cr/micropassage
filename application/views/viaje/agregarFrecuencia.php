<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AGREGAR FRECUENCIA|PASSAGESYSTEM</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.min.js"></script>

    <link rel="stylesheet" href="/PassageSystem/resources/css/jquery.timepicker.min.css">
    <script src="/PassageSystem/resources/js/jquery.timepicker.min.js"></script>


    <!-- SCRIPT JQUERY DATEPICKER -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/PassageSystem/resources/css/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <script>
        $(document).ready(function () {
            (function($) {
                $(function() {
                    $('input.timepicker').timepicker({
                        timeFormat: 'H:mm'
                    });
                });
            })(jQuery);
        })
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">


<body>
<header class="fluid-container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="">
            <img src="../recursos/images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            PassageSystem
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PassageSystem/index.php/Usuario/">Mi Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PassageSystem/index.php/Pasaje/PasajesComprados">Compras Efectuadas</span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<section class="container">
    <form id="FORMHorario" action="/PassageSystem/index.php/Viaje/AgregadoViaje" method="post">
        <label class="">HORA DE VIAJE</label>
        <input type="text" class="timepicker form-control form-control-lg" name="time"/>

        <LABEL>Dia de Viaje</LABEL>
        <select name="Ciudad Destino" class="form-control form-control-lg">
            <option value="Lunes">LUNES</option>
            <option value="Martes">MARTES</option>
            <option value="Miercoles">MIERCOLES</option>
            <option value="Jueves">JUEVES</option>
            <option value="Viernes">VIERNES</option>
            <option value="Sabado">SABADO</option>
            <option value="Domingo">DOMINGO</option>
        </select>

        <input type="text" name='ciudadOrigen' value='<?php echo $ciudadOrigen?>' hidden>
        <input type="text" name='CiudadDestino' value='<?php echo $CiudadDestino?>' hidden>
        <input type="text" name='tarifa' value='<?php echo $tarifa?>' hidden>
        <input type="text" name='ColectivoID' value='<?php echo $ColectivoID?>' hidden>

        <button type="submit" class="btn btn-block btn-primary" id='AgregarHorarios'>Agregar Viaje</button>
    </form>
</section>
</body>
</html>