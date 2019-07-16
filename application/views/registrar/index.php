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
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="text-center"">
<div class="form-signin badge badge-dark mt-5">
    <form class="" method="post" action="<?php echo base_url(); ?>index.php/Registrar/validation">
             <span class="badge badge-dark align-middle">
                     <img src="<?php echo base_url("resources/img/logo.jpg");?>" alt="">
                </span>
        <h1 class="h5 mb-6 font-weight-normal">COMPLETE LOS DATOS</h1>
        <div class="form-group">
            <label>Ingresa Tu Nombre</label>
            <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" />
            <span class="text-danger"><?php echo form_error('name'); ?></span>
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
            <input type="submit" name="register" value="Registrar" class="btn btn-info" />
        </div>
    </form>
</div>
</body>
</html>