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

    <script>
    var idViaje;
    var diaViaje;

        $(document).ready(function () {
            $("#NombreOrigen").change(function (e) {
                e.preventDefault();
                var Origen = $("#NombreOrigen").val();

                var request = $.ajax({
                    url: "Viaje/obtenerViajesporID",
                    method: "POST",
                    data: { Origen : Origen },
                    dataType: "html"
                });
                    
                request.done(function( msg ) {
                    var destinos = JSON.parse(msg);
                    console.log(destinos);
                    $('#NombreDestino').prop("disabled",false);
                    $('#NombreDestino').append("<option value=\'"+destinos[0]['idciudadestino']+"\' >"+destinos[0]['nombreCiudad']+"</option>");
                    $idViaje = destinos[0]['idViaje'];
        
                });
                    
            });

            /* $("#NombreDestino").change(function (e) {
                e.preventDefault();
                var Origen = $("#NombreOrigen").val();
                var Destino = $("#NombreDestino").val();
                var request = $.ajax({
                    url: "Viaje/obtenerFechasViajes",
                    method: "POST",
                    data: { Origen : Origen, Destino : Destino},
                    dataType: "html"
                });
                    
                request.done(function( msg ) {
                   
                    var viajes = JSON.parse(msg);
                    console.log(viajes);
                    


                    function DisableMonday(date) {

                    var events = {};

                    $.each(viajes,function(i,v){
                        if(v.dia=="Lunes"){
                            events[v.dia]='1';
                        }
                        
                    })

                    console.log(events);
                    

                    var day = date.getDay();
                    var day2 = 2;
                    // If day == 1 then it is MOnday
                    if (day == 1 && day2==2) {

                    return [false,false] ; 

                    } else { 

                    return [true] ;
                    }

            

                    
                    
                    }


                    $( "#datefechaPartida" ).datepicker({
                        dateFormat: "dd-mm-yy",
                        dayNamesMin: [ "Do", "Lu", "Ma", "Mie", "Ju", "Vi", "Sa" ],
                        minDate: new Date(),
                        beforeShowDay: DisableMonday
                    });
                });
                    
            }); */

            $( "#datefechaPartida" ).datepicker({
                        dateFormat: "dd-mm-yy",
                        dayNamesMin: [ "Do", "Lu", "Ma", "Mie", "Ju", "Vi", "Sa" ],
                        minDate: new Date(),
                        onSelect: function(dateText){
                            var fecha = $(this).datepicker('getDate');
                            fecha = fecha.toDateString();
                            fecha = fecha.split(' ');
                            console.log(fecha);

                            var weekday=new Array();
                                weekday['Mon']="Lunes";
                                weekday['Tue']="Martes";
                                weekday['Wed']="Miércoles";
                                weekday['Thu']="Jueves";
                                weekday['Fri']="Viernes";
                                weekday['Sat']="Sábado";
                                weekday['Sun']="Domingo";
                            diaViaje = weekday[fecha[0]];
                            console.log(diaViaje);

                            var Origen = $("#NombreOrigen").val();
                            var Destino = $("#NombreDestino").val();
                            var request = $.ajax({
                            url: "Viaje/obtenerFechasViajes",
                            method: "POST",
                            data: { Origen : Origen, Destino : Destino},
                            dataType: "html"
                            });
                            
                            request.done(function( msg ) {
                    
                            var viajes = JSON.parse(msg);
                            console.log(viajes);

                            $.each(viajes,function(i,v){
                                if(v.dia==diaViaje){
                                    console.log("verdadero");
                                }
                                });
                            });
                        }
                    })

            
            
            $("#NombreDestino").change(function (e) {
                e.preventDefault();
                var Origen = $("#NombreOrigen").val();
                var Destino = $("#NombreDestino").val();
                var request = $.ajax({
                    url: "Viaje/obtenerFechasViajes",
                    method: "POST",
                    data: { Origen : Origen, Destino : Destino},
                    dataType: "html"
                });
                    
                request.done(function( msg ) {
                   
                    var viajes = JSON.parse(msg);
                    console.log(viajes);
                    
                });
                    
            });

            $("#BuscarPasaje").click(function (e) { 
                e.preventDefault();
                var Origen = $("#NombreOrigen").val();
                var Destino = $("#NombreDestino").val();
                var FechaIda = $("#datefechaPartida").val();

                console.log(diaViaje);
                console.log(Destino);
                console.log(FechaIda);

                var request = $.ajax({
                    url: "Viaje/BuscarPasajes",
                    method: "POST",
                    data: { Origen : Origen, Destino : Destino, Dia : diaViaje},
                    dataType: "html"
                });
                    
                request.done(function( msg ) {
                    var viajes = JSON.parse(msg);
                    console.log(viajes);
                    
                    $("#resultado").html('<table class="table">'+
                                            '<thead>'+
                                            '<tr>'+
                                            '<th>Dia</th><th>Fecha</th><th>Hora</th><th>Ciudad Origen</th><th>Ciudad Destino</th><th>Tarifa Comun</th><th>Opciones</th>'+
                                            '</tr>'+
                                            '</thead>'+
                                            '<tbody id="cuerpotabla">'+
                                            '</tbody>'+
                                            '</table>');



                    

                    $.each(viajes,function(i,v){
                        console.log(v);
                        $("#cuerpotabla").append('<tr>'+
                                                '<td>'+v.dia+'</td>'+
                                                '<td>'+$("#datefechaPartida").val()+'</td>'+
                                                '<td>'+v.hora+'</td>'+
                                                '<td>'+$("#NombreOrigen option:selected").text()+'</td>'+
                                                '<td>'+$("#NombreDestino option:selected").text()+'</td>'+
                                                '<td>'+v.tarifa+'</td>'+
                                                '<td><a href="http://localhost/PassageSystem/index.php/Ventas/ElegirViaje?fecha='+$("#datefechaPartida").val()+'&origen='+$("#NombreOrigen").val()+'&destino='+$("#NombreDestino").val()+'&hora='+v.hora+'"><button type="button" class="btn btn-outline-primary">Elegir Viaje</button></td></a>'+
                                                '</tr>');  
                        });

                });
                    
            });

            
            
        });    
        

        

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
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
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