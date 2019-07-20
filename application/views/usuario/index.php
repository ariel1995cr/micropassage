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
<body class="container">
    <section>
        <article>
            <?php
            print_r($usuario);
            ?>
            <h1>Perfil de Usuario <span class="badge badge-secondary">New</span></h1>
            <ul class="list-group text-center">
                <li class="list-group-item list-group-item-dark font-weight-bold">DATOS PERSONALES</li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nombres: <?php echo $usuario[0]->getNombres(); ?></li>
                <li class="list-group-item">Apellido: <?php echo $usuario[0]->getApellido(); ?></li>
                <li class="list-group-item">Dni: <?php echo $usuario[0]->getDni(); ?></li>
                <li class="list-group-item">Email: <?php echo $usuario[0]->getEmail(); ?></li>
                <li class="list-group-item">Telefono: <?php echo $usuario[0]->getTelefono(); ?></li>
                <li class="list-group-item">Pasajero Frecuente: <?php echo $usuario[0]->getPasajeroFrecuente(); ?></li>
            </ul>
        </article>
    </section>
</body>
</html>