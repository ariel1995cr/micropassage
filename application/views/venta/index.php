<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
    <!-- SCRIPT JQUERY DATEPICKER -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="/PassageSystem/resources/js/inicio.js">
    </script>
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
        <div class="jumbotron">
            <h1 class="display-4">Hola, <?php echo $this->session->userdata('nombreUsuario') ?>!</h1>
            <p class="lead">Bienvenido aca podes gestionar todas las compras para tu viaje tal y como lo deseas.</p>
            <hr class="my-4">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-50 bd-highlight">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 w-75 bd-highlight">
                            ORIGEN
                            <select id="NombreOrigen" class="form-control form-control-lg">
                                <option>Seleccionar Ciudad</option>
                                <!--SE LLENA EL COMBO BOX-->
                                <?php
                                foreach ($ciudades as $ciudad){
                                    echo "<option value='$ciudad->idCiudad'>$ciudad->nombreCiudad</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="p-2 bd-highlight">
                            Fecha Partida(Obligatorio)
                            <input type="text" class="form-control form-control-lg" id="datefechaPartida" placeholder="">
                        </div>
                    </div>

                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 w-75 bd-highlight">
                            DESTINO
                            <select id="NombreDestino" class="form-control form-control-lg" disabled>
                                <option>Large select</option>
                            </select>
                        </div>
                        <div class="p-2 bd-highlight">
                            Fecha Vuelta
                            <input type="email" class="form-control form-control-lg" id="fechaPartida" placeholder="">
                        </div>
                    </div>
                    <button type="button" id="BuscarPasaje" class="mt-3 btn btn-primary btn-lg btn-block">Buscar Pasaje</button>
                </div>
                <div class="p-2 bd-highlight">Flex item</div>
            </div>
        </div>

        <div id="resultado" class="d-flex bd-highlight">
        </div>
    </article>
</section>
</body>
</html>