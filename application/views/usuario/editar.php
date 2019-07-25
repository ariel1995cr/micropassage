<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
<div class="container">
    <?php echo validation_errors(); ?>
<form action="/PassageSystem/index.php/Usuario/ActualizarDatos" method="post">
    <div class="row">
        <div class="col">
            <label>E-mail:</label>
            <input type="text" name="email" class="form-control" value="<?php echo $usuario[0]->getEmail(); ?>" placeholder="Email">
        </div>
        <div class="col">
            <label>Nombres:</label>
            <input type="text" name="nombres" class="form-control" value="<?php echo $usuario[0]->getNombres(); ?>" placeholder="Nombres">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo $usuario[0]->getApellido(); ?>" placeholder="Apellido">
        </div>
        <div class="col">
            <label>Dni:</label>
            <input type="text" name="dni" class="form-control" value="<?php echo $usuario[0]->getDni(); ?>" placeholder="Dni">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>Telefono:</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo $usuario[0]->getTelefono(); ?>" placeholder="telefono">
        </div>
        <div class="col">
            <label>PasajeroFrecuente:</label>
            <?php
            if ($usuario[0]->getPasajeroFrecuente()=="SI"){
                echo "<select name='pasajeroFrecuente' class='custom-select'>";
                echo "<option value='SI' selected>".$usuario[0]->getPasajeroFrecuente()."</option>";
                echo "<option value='NO'>NO</option>";
                echo "</select>";
            }else {
                echo "<select class='custom-select'>";
                echo "<option value='SI'>".$usuario[0]->getPasajeroFrecuente()."</option>";
                echo "<option value='NO' selected>NO</option>";
                echo "</select>";
            }
            ?>

        </div>
    </div>
    <input type="submit" class="mt-3 btn btn-outline-primary" name="Boton" value="ConfirmarDatos">
</form>
</div>
</body>
</html>