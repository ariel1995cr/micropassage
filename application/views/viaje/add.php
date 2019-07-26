<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AGREGAR VIAJES|PASSAGESYSTEM</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.min.js"></script>


    <!-- SCRIPT JQUERY DATEPICKER -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/PassageSystem/resources/css/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--SCRIPT PARA ALERT-->
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery.inputmask.js"></script>

    <script>
        $(document).ready(function () {
            $("#tarifa").inputmask({"mask": "999.99"});
        })

    </script>
</head>
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
    <form id="FORMHorario" action="/PassageSystem/index.php/Viaje/agregarFrecuenciasViajes" method="post">
        <div class="row">
            <div class="col">
                <label>CIUDAD DE ORIGEN</label>
                <select name="ciudadOrigen" class="form-control form-control-lg">
                    <option value="">Elegir Origen</option>
                    <?php
                    foreach ($ciudades as $ciudad) {
                        echo "<option value='$ciudad->idCiudad'>".$ciudad->nombreCiudad."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <LABEL>CIUDAD DE DESTINO</LABEL>
                <select name="CiudadDestino" class="form-control form-control-lg">
                    <option value="">Elegir Destino</option>
                    <?php
                    foreach ($ciudades as $ciudad) {
                        echo "<option value='$ciudad->idCiudad'>".$ciudad->nombreCiudad."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Tarifa</label>
                <input type="text" id="tarifa" name="tarifa" class="form-control form-control-lg" placeholder="VALOR DE TARIFA">
            </div>
            <div class="col">
                <label>Id Colectivo</label>
                <select name="ColectivoID" class="form-control form-control-lg">
                    <option value="">Elegir Colectivo</option>
                    <?php
                    foreach ($colectivos as $colectivo) {
                        echo "<option value='$colectivo->idColectivo'>".$colectivo->idColectivo."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-block btn-primary" id='AgregarHorarios'>Agregar Viaje</button>
    </form>
</section>
</body>
</html>