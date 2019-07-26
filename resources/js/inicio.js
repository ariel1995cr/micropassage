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
            var x=0;
            $("#NombreDestino").html("<option value=''>Elegir Destino</option>");
            for(x;x<destinos.length;x++){
                $('#NombreDestino').append("<option value=\'"+destinos[x]['idciudadestino']+"\' >"+destinos[x]['nombreCiudad']+"</option>");
            }


            idViaje = destinos[0]['idViaje'];

        });

    });

    $( "#datefechaPartida" ).datepicker({
        dateFormat: "dd-mm-yy",
        dayNamesMin: [ "Do", "Lu", "Ma", "Mie", "Ju", "Vi", "Sa" ],
        minDate: new Date(),
        onSelect: function(dateText){
            console.log(dateText);
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
        var Origen = $("#NombreOrigen").val().trim();
        var Destino = $("#NombreDestino").val().trim();
        var FechaIda = $("#datefechaPartida").val().trim();

        if (Origen == "" || Destino == "" || FechaIda == ""){
            alert("Debe estar completo los campos de Origen, Destino y Fecha de Pasaje");
        } else {
            var request = $.ajax({
                url: "Viaje/BuscarPasajes",
                method: "POST",
                data: { Origen : Origen, Destino : Destino, Dia : diaViaje},
                dataType: "html"
            });

            request.done(function( msg ) {
                var viajes = JSON.parse(msg);


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
                    console.log(v['idciudadestino']);
                    var hora = v.hora.split(":");
                    var fecha = $("#datefechaPartida").val().split("-");

                    var fechaHoraViaje = new Date(fecha[1]+"-"+fecha[0]+"-"+fecha[2]);
                    fechaHoraViaje.setHours(hora[0]-2);
                    fechaHoraViaje.setMinutes(hora[1]);

                    var fechaHoraActual = new Date();

                    if (fechaHoraViaje<fechaHoraActual){
                        console.log("es menor");
                    } else {
                        $("#cuerpotabla").append('<tr>'+
                            '<td>'+v.dia+'</td>'+
                            '<td>'+$("#datefechaPartida").val()+'</td>'+
                            '<td>'+v.hora+'</td>'+
                            '<td>'+$("#NombreOrigen option:selected").text()+'</td>'+
                            '<td>'+$("#NombreDestino option:selected").text()+'</td>'+
                            '<td>'+v.tarifa+'</td>'+
                            '<td><a href="http://localhost/PassageSystem/index.php/Ventas/Comprar/'+$("#datefechaPartida").val()+'/'+v.idViaje+'/'+v.idFrecuencia+'"><button type="button" name="ElegirViaje" class="btn btn-outline-primary">Elegir Viaje</button></td></a>'+
                            '</tr>');
                    }


                });

            });

        }

    });

});



