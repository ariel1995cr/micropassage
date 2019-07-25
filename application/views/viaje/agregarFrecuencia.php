<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.min.js"></script>


    <!-- SCRIPT JQUERY DATEPICKER -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/PassageSystem/resources/css/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="/PassageSystem/resources/css/jquery.datetimepicker.css">
    <script src="/PassageSystem/resources/js/jquery.datetimepicker.full.min.js"></script>

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
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="input-group date"  data-target-input="nearest">
                            <input type="text" id="datetimepicker3" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker3').datetimepicker({
                            datepicker:false,
                            format:'H:i'
                        });
                    });
                </script>
            </div>

        <button type="submit" class="btn btn-block btn-primary" id='AgregarHorarios'>Agregar Viaje</button>
    </form>
</section>
</body>
</html>