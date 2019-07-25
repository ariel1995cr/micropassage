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
    <section class="container">
        <article>
            <h1 class="text-center mt-3">Perfil de Usuario <span class="badge badge-secondary">New</span></h1>
            <ul class="list-group text-center">
                <li class="list-group-item list-group-item-dark font-weight-bold">DATOS PERSONALES</li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-secondary text-white font-weight-bold text-monospace">Nombres:<?php echo $usuario[0]->getNombres(); ?></li>
                <li class="list-group-item bg-secondary text-white font-weight-bold text-monospace">Apellido: <?php echo $usuario[0]->getApellido(); ?></li>
                <li class="list-group-item bg-secondary text-white font-weight-bold text-monospace">Dni: <?php echo $usuario[0]->getDni(); ?></li>
                <li class="list-group-item bg-secondary text-white font-weight-bold text-monospace">Email: <?php echo $usuario[0]->getEmail(); ?></li>
                <li class="list-group-item bg-secondary text-white font-weight-bold text-monospace">Telefono: <?php echo $usuario[0]->getTelefono(); ?></li>
                <li class="list-group-item bg-secondary text-white font-weight-bold text-monospace">Pasajero Frecuente: <?php echo $usuario[0]->getPasajeroFrecuente(); ?></li>
            </ul>

            <div class="mt-5" role="group" aria-label="Basic example">
                <form action="/PassageSystem/index.php/Usuario/edit" method="post">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" name="EditarDatos" value="EditarDatos">
                </form>
            </div>
        </article>
    </section>
</body>
</html>