<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAMBIAR CONTRASEÑA|PASSAGE SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="/PassageSystem/resources/js/jquery-3.4.1.min.js"></script>


    <!-- SCRIPT JQUERY DATEPICKER -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/PassageSystem/resources/css/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </head>
  <body>
    <header class="fluid-container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="">
                <img src="../recursos/images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
                PassageSystem
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PassageSystem/index.php/Usuario/">Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PassageSystem/index.php/Pasaje/PasajesComprados">Compras Efectuadas</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section class="container">
        <article>
            <div class="jumbotron">
              <div class="d-flex justify-content-center">
                          <div class="p-2 w-50 bd-highlight ">
                            <form class="" action="/PassageSystem/index.php/Usuario/cambiarContrasenia" method="post">

                              Contraseña actual:
                              <input type="text" class="form-control form-control-lg" id="contraseñaActual" placeholder="" name="contraseñaActual">

                              Contraseña nueva:
                              <input type="text" class="form-control form-control-lg" id="contraseñaNueva" placeholder="" name="contraseñaNueva">

                              Repetir contraseña nueva:
                              <input type="text" class="form-control form-control-lg" id="contraseñaRepetir" placeholder="" name="contraseñaRepetir">

                              <input type="submit" name="confirmarContrasenia" value="Guardar" class="mt-3 btn btn-primary btn-lg btn-block">

                            </form>
                      </div>
                      </div>
              </div>
        </article>
    </section>
  </body>
</html>
