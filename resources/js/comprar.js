$(function() {


    $(".badge-primary").click(function(e) {
        var valorPasaje = document.getElementById("tarifa").innerText;
        var valorPasajePuntos = valorPasaje * 2.5;
        if (parseInt(e.target.innerText)>=53){
            valorPasaje = valorPasaje * 2;
            tipoAsiento = "ejecutivo";
        } else if (parseInt(e.target.innerText)>=24 && parseInt(e.target.innerText)<=52){
            var descuento = valorPasaje * 0.3;
            valorPasaje = valorPasaje - descuento;
            tipoAsiento = "promocional";
        }
        $.confirm({
            title: 'Gracias por Elegirnos!',
            content:
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Confirma la seleecion de asiento numero: '+e.target.innerText+'</label>' +
                '<label>Valor del Pasaje: $'+valorPasaje+'</label>' +
                '<label>Valor del Pasaje en Puntos: '+valorPasajePuntos+'</label>' +
                '<label>Tipo de Asiento: '+tipoAsiento+'</label>' +
                '<label>Ingrese el Nro de Dni:</label>'+
                '<input type="text" placeholder="Ingrese Dni" id="dni" class="form-control" required />' +
                '<label>Ingrese los Nombres:</label>'+
                '<input type="text" placeholder="Ingrese Nombre" id="Nombres" class="name form-control" required />' +
                '<label>Ingrese Apellido:</label>'+
                '<input type="text" placeholder="Ingrese Apellido" id="Apellido" class="form-control" required />' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Confirmar Asiento',
                    btnClass: 'btn-blue',
                    action: function () {
                        var nombre = this.$content.find('#Nombres').val().trim();
                        var dni = this.$content.find('#dni').val().trim();
                        var apellido = this.$content.find('#Apellido').val().trim();
                        var butaca = e.target.innerText;
                        var idFrecuencia = datosViaje.idFrecuencia;
                        var idViaje = datosViaje.idViaje;
                        var metodoPago = "Tarjeta";

                        $("#ButacasElegidas").append("<tr>" +
                            "<td>"+nombre+"</td>"+
                            "<td>"+apellido+"</td>"+
                            "<td>"+dni+"</td>"+
                            "<td>"+e.target.innerText+"</td>"+
                            "<td>"+valorPasaje+"</td>"+
                            "<td>"+tipoAsiento+"</td>"+
                            "<td>"+metodoPago+"</td>"+
                            "</tr>");
                        $("#"+e.target.innerText+"").removeClass("badge-primary").addClass("badge-danger");

                        butacasElegidas.push({nombre, dni, apellido,butaca,valorPasaje,tipoAsiento, idFrecuencia, idViaje,fechaViaje, origen, destino,metodoPago});

                    }
                },
                cancel: function () {
                    //close
                },

                somethingElse: {
                    text: 'Confirmar Asiento Puntos',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                        if(PuntosDisponibles>valorPasajePuntos){
                            var nombre = this.$content.find('#Nombres').val().trim();
                            var dni = this.$content.find('#dni').val().trim();
                            var apellido = this.$content.find('#Apellido').val().trim();
                            var butaca = e.target.innerText;
                            var idFrecuencia = datosViaje.idFrecuencia;
                            var idViaje = datosViaje.idViaje;
                            var metodoPago = "Puntos";

                            $("#ButacasElegidas").append("<tr>" +
                                "<td>"+nombre+"</td>"+
                                "<td>"+apellido+"</td>"+
                                "<td>"+dni+"</td>"+
                                "<td>"+e.target.innerText+"</td>"+
                                "<td>"+valorPasaje+"</td>"+
                                "<td>"+tipoAsiento+"</td>"+
                                "<td>"+metodoPago+"</td>"+
                                "</tr>");
                            $("#"+e.target.innerText+"").removeClass("badge-primary").addClass("badge-danger");

                            butacasElegidas.push({nombre, dni, apellido,butaca,valorPasaje,tipoAsiento, idFrecuencia, idViaje,fechaViaje, origen, destino,metodoPago});

                        } else {
                            $.alert('No le Alcanza los Puntos para Comprar el Asiento pruebe con otro Metodo!');
                        }
                    }
                }
            }
        });
    });


    $('#ConfirmarCompra').click(function () {

        console.log(JSON.stringify(butacasElegidas));
        $("#DatosCompra").append("<input name='datos' value='" +
            JSON.stringify(butacasElegidas) +
            "'hidden>")

        $("#DatosCompra").submit();

    })
});