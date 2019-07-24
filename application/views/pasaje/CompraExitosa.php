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
    <p class="font-weight-bold text-center">FELICIDADES COMPRA TERMINADA! IMPRIMI TUS PASAJES:</p>
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
        foreach ($asientos as $asiento){

            echo "<tr>";
            echo "<td>".$asiento[0]->getIdBoleto()."</td>";
            echo "<td>".$asiento[0]->getCiudadOrigen()."</td>";
            echo "<td>".$asiento[0]->getCiudadDestino()."</td>";
            echo "<td>".$asiento[0]->getNombre()." ".$asiento[0]->getApellido()."</td>";
            echo "<td>".$asiento[0]->getNroButaca()."</td>";
            echo "<td><a href='/PassageSystem/index.php/Pasaje/ImprimirPasaje/".$asiento[0]->getIdBoleto()."'><button class='btn btn-info'>Imprimir Pasaje</button></a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>