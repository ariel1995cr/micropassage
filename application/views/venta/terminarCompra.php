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
    <title>REALIZAR PAGO|PASSAGE SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="/PassageSystem/resources/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
        PassageSystem
    </a>
</nav>
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            MUCHAS GRACIAS POR CONFIAR EN NOSTROS! ESTAMOS A UN PASO DE TERMINAR LA COMPRA DE TUS PASAJES!
        </div>
        <div class="card-body">
            <h5 class="card-title">PASAJES A COMPRAR</h5>
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Precio Pasaje</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Butaca Nro</th>
                    <th scope="col">Metodo de Pago</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($butacasCompradas as $butaca){
                    echo "<tr>";
                    echo "<td>".$info[0]->origen."</td>";
                    echo "<td>".$info[0]->destino."</td>";
                    echo "<td>".$butaca->getFechaPasaje()."</td>";
                    echo "<td>".$butaca->getPrecioPasaje()."</td>";
                    echo "<td>".$butaca->getDniAsignado()."</td>";
                    echo "<td>".$butaca->getNombre()."</td>";
                    echo "<td>".$butaca->getApellido()."</td>";
                    echo "<td>".$butaca->getNroButaca()."</td>";
                    echo "<td>".$butaca->getMetodopago()."</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>

        </div>
        <?php
        if($valorTotal==0){
            ?>
            <div class="card-footer text-muted">
                <form action="/PassageSystem/index.php/Pasaje/compraExitosaPuntos" method="POST">

                    <input name="ButacasCompradas" value='<?php echo $datosPost?>' hidden>

                    <input type="submit" class="btn btn-primary" value="Terminar Compra Puntos">
                </form>
            </div>
            <?php
        }else {
            ?>
            <div class="card-footer text-muted">
                <form action="/PassageSystem/index.php/Pasaje/compraExitosa" method="POST">
                    <script
                            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-access-token= “TEST-7666547261035560-061917-b3827db4841fb02755468af4d6bd24a1-134046859”
                            data-preference-id="<?php echo $preference->id; ?>"
                            data-button-label="REALIZAR PAGO DE PASAJES">
                    </script>

                    <input name="ButacasCompradas" value='<?php echo $datosPost?>' hidden>
                </form>
            </div>
        <?php
        }
        ?>

    </div>

</div>


</body>
</html>