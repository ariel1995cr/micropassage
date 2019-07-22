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
<section>
    <article>
        <div class="container text-center">
            <?php
            if($this->session->flashdata('message'))
            {
                echo '
                    <div class="alert alert-danger">
                        '.$this->session->flashdata("message").'
                    </div>
                    ';
            }
            ?>
            <img src="<?php echo base_url('/resources/img/logo.jpg')?>" alt="..." class="border border-primary rounded-circle shadow p-3 mt-5 bg-white rounded">

            <div class="card mx-auto" style="width: 40%;">
                <div class="card-body align-middle">
                    <form action="/PassageSystem/index.php/Login/validation" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nombre de Usuario:</label>
                            <input type="text" name="email" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Contraseña:</label>
                            <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </article>
</section>
</body>
</html>