<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PASAJES COMPRADOS|PASSAGESYSTEM</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.min.js"></script>


    <!-- SCRIPT JQUERY DATEPICKER -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="/PassageSystem/resources/js/inicio.js">
    </script>
</head>

<body>
<header class="fluid-container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="">
            <img src="/PassageSystem/resources/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            PassageSystem
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/PassageSystem/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PassageSystem/index.php/Usuario/">Mi Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Compras Efectuadas</span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<section class="container bg-secondary">
    <article>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">PASAJE</th>
                <th scope="col">CIUDAD SALIDA</th>
                <th scope="col">CIUDAD DESTINO</th>
                <th scope="col">PASAJERO</th>
                <th scope="col">NRO BUTACA</th>
                <th scope="col">IMPRIMIR PASAJE</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pasajes as $pasaje){

                    echo "<tr>";
                    echo "<td>".$pasaje->getIdBoleto()."</td>";
                    echo "<td>".$pasaje->getCiudadOrigen()."</td>";
                    echo "<td>".$pasaje->getCiudadDestino()."</td>";
                    echo "<td>".$pasaje->getNombre()." ".$pasaje->getApellido()."</td>";
                    echo "<td>".$pasaje->getNroButaca()."</td>";
                    echo "<td><a href='/PassageSystem/index.php/Pasaje/ImprimirPasaje/".$pasaje->getIdBoleto()."'><button class='btn btn-info'>Imprimir Pasaje</button></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <?php echo $paginacion->create_links(); ?>

    </article>
</section>


</body>
<footer class="container-fluid btn-primary">

</footer>
</html>