<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="container">

<div class="bg-primary mt-5 rounded bg-secondary">
    <table class="table table-borderless">
        <thead>
        <tr>
            <th colspan="4"><img src="<?php echo $_SERVER['DOCUMENT_ROOT']."/PassageSystem/resources/img/logo.jpg"?>" width="40" height="40" class="rounded-circle">BusTicket</th>
            <TH>Boleto Nro: <?php echo $datos->getIdBoleto()?></TH>
            <th style="border-left-style: dotted"><img src="<?php echo $_SERVER['DOCUMENT_ROOT']."/PassageSystem/resources/img/logo.jpg"?>" width="40" height="40" class="rounded-circle">BusTicket</th>
            <TH colspan="3">Boleto Nro: <?php echo $datos->getIdBoleto()?></TH>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>PASAJERO:</td>
            <td colspan="4"><div class="bg-light rounded"><?php echo $datos->getNombre()." ".$datos->getApellido(); ?></div></td>
            <td style="border-left-style: dotted">PASAJERO:</td>
            <td colspan="3"><div class="bg-light rounded"><?php echo $datos->getNombre()." ".$datos->getApellido(); ?></div></td>
        </tr>
        <tr>
            <td>FECHA:</td>
            <td colspan="4"><div class="bg-light rounded"><?php echo $datos->getFechaPasaje(); ?></div></td>
            <td style="border-left-style: dotted">FECHA:</td>
            <td colspan="3"><div class="bg-light rounded"><?php echo $datos->getFechaPasaje(); ?></div></td>
        </tr>
        <tr>
            <td>HORA:</td>
            <td colspan="3"><div class="bg-light rounded"><?php echo $datos->getHora(); ?></div></td>
            <td class="font-weight-bold">Butaca</td>
            <td style="border-left-style: dotted">HORA:</td>
            <td COLSPAN="3"><div class="bg-light rounded"><?php echo $datos->getHora(); ?></div></td>
        </tr>
        <tr>
            <td>DESDE:</td>
            <td colspan="3"><div class="bg-light rounded"><?php echo $datos->getCiudadOrigen(); ?></div></td>
            <td><div class="bg-light rounded"><?php echo $datos->getNroButaca()?></div></td>
            <td style="border-left-style: dotted">DESDE:</td>
            <td COLSPAN="3"><div class="bg-light rounded"><?php echo $datos->getCiudadOrigen(); ?></div></td>
        </tr>
        <tr>
            <td>HASTA:</td>
            <td class="" colspan="4"><div class="bg-light rounded"><?php echo $datos->getCiudadDestino(); ?></div></td>
            <td style="border-left-style: dotted">FECHA:</td>
            <td COLSPAN="3"><div class="bg-light rounded"><?php echo $datos->getCiudadDestino(); ?></div></td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td style="border-left-style: dotted">Butaca:</td>
            <td colspan="3"><div class="bg-light rounded"><?php echo $datos->getNroButaca()?></div></td>
        </tr>

        </tbody>
        <tfoot>
        <tr>
            <th colspan="5">TICKET</th>
            <th style="border-left-style: dotted" colspan="3">TICKET</th>
        </tr>
        </tfoot>
    </table>
</div>

</body>
</html>