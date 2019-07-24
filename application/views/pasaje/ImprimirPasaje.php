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
    <div class="d-flex">
        <div class="p-2 bd-highlight w-75">
            <p class="display-4 font-weight-bold">Bus Ticket</p>
        </div>
        <div class="border-left p-2 bd-highlight align-self-end">
            <p class="font-weight-bold"><h2>Bus Ticket</h2></p>
        </div>
    </div>
    <div class="bg-info">
        <div class="d-flex">
            <div class="p-2 bd-highlight form-group ml-2 mr-1 row p-3 mb-2 text-white w-50">
                <label for="Fecha" class="col-sm-2 col-form-label">FECHA</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext bg-light rounded" id="Fecha" value="26-02-95">
                </div>
                <label for="HORA" class="col-sm-2 col-form-label mt-3">HORA</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" readonly class="form-control-plaintext bg-light rounded" id="HORA" value="16:30">
                </div>
                <label for="origen" class="col-sm-2 col-form-label mt-3">DESDE</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" readonly class="form-control-plaintext bg-light rounded" id="origen" value="Comodoro">
                </div>
                <label for="destino" class="col-sm-2 col-form-label mt-3">HASTA</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" readonly class="form-control-plaintext bg-light rounded" id="destino" value="Buenos Aires">
                </div>
            </div>
            <div class="p-2 bd-highlight text-white">
                <label for="Fecha" class="col-sm-2 col-form-label">ASIENTO</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext bg-light rounded" style="height: 100px;" id="Fecha" value="26-02-95">
                </div>
            </div>
            <div class="border-left p-2 bd-highlight form-group ml-2 mr-1 row p-3 mb-2 text-white w-25">
                <label for="Fecha" class="col-sm-2 col-form-label">FECHA</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="ml-2 form-control-plaintext bg-light rounded" id="Fecha" value="26-02-95">
                </div>
                <label for="HORA" class="col-sm-2 col-form-label mt-3">HORA</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" readonly class="ml-2 form-control-plaintext bg-light rounded" id="HORA" value="16:30">
                </div>
                <label for="origen" class="col-sm-2 col-form-label mt-3">DESDE</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" readonly class="ml-2 form-control-plaintext bg-light rounded" id="origen" value="Comodoro">
                </div>
                <label for="destino" class="col-sm-2 col-form-label mt-3">HASTA</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" readonly class="ml-2 form-control-plaintext bg-light rounded" id="destino" value="Buenos Aires">
                </div>
            </div>
        </div>
    </div>
    <div>
        <p class="ml-5 text-capitalize font-weight-bold">PASAJE DE COLECTIVO</p>
    </div>
</div>

</body>
</html>