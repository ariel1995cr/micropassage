<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="text-center"">
<div class="form-signin badge badge-dark mt-5">
    <form class="" method="post" action="<?php echo base_url(); ?>index.php/Registrar/validation">
             <span class="badge badge-dark align-middle">
                     <img src="<?php echo base_url("resources/img/logo.jpg");?>" class="border border-primary rounded-circle shadow p-3 mt-5 bg-white rounded">
                </span>
        <h1 class="h5 mb-6 font-weight-normal">COMPLETE LOS DATOS</h1>
        <div class="form-group">
            <label>Ingresa Tus Nombres</label>
            <input type="text" name="nombres" class="form-control" value="<?php echo set_value('nombres'); ?>" />
            <span class="text-danger"><?php echo form_error('nombres'); ?></span>
        </div>
        <div class="form-group">
            <label>Ingresa Tu Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo set_value('apellido'); ?>" />
            <span class="text-danger"><?php echo form_error('apellido'); ?></span>
        </div>
        <div class="form-group">
            <label>Ingresa Tu Dni</label>
            <input type="text" name="dni" class="form-control" value="<?php echo set_value('dni'); ?>" />
            <span class="text-danger"><?php echo form_error('dni'); ?></span>
        </div>
        <div class="form-group">
            <label>Ingresa Tu Telefono</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo set_value('telefono'); ?>" />
            <span class="text-danger"><?php echo form_error('telefono'); ?></span>
        </div>
        <div class="form-group">
            <label>Ingresa Tu Nombre de Usuario(Para Aplicación)</label>
            <input type="text" name="nombreUsuario" class="form-control" value="<?php echo set_value('nombreUsuario'); ?>" />
            <span class="text-danger"><?php echo form_error('nombreUsuario'); ?></span>
        </div>
        <div class="form-group">
            <label>Ingresa Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" />
            <span class="text-danger"><?php echo form_error('email'); ?></span>
        </div>
        <div class="form-group">
            <label>Ingresa Contraseña</label>
            <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" />
            <span class="text-danger"><?php echo form_error('password'); ?></span>
        </div>
        <div class="form-group">
            <label>Desea Participar del Programa Pasajero Frecuente?</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pasajerofrecuente" id="pasajerofrecuentesi" value="si">
                <label class="form-check-label" for="pasajerofrecuentesi">SI</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pasajerofrecuente" id="pasajerofrecuenteno" value="no">
                <label class="form-check-label" for="pasajerofrecuenteno">NO</label>
            </div>
            <span class="text-danger"><?php echo form_error('pasajerofrecuente'); ?></span>
        </div>
        <div class="form-group">
            <input type="submit" name="register" value="Registrar" class="btn btn-info" />
        </div>
    </form>
</div>
</body>
</html>