function actualizarDestino(){
    var post = "id=" + $('#origen').val();
    $.ajax({
        url: "../ajax/selectTerminal.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#destino").html(datos);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function consultarViajes(){
    var post = "origen=" + $('#origen').val();
    post = post + "&destino=" + $('#destino').val();
    post = post + "&fecha=" + $('#fecha').val();
    $.ajax({
        url: "../ajax/listaDeConsulta.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#viajes").html(datos);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}


function actualizarViajes(){
    var post = "fecha=" + $('#fecha').val();
    $.ajax({
        url: "../ajax/selectViajes.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#viajes").html(datos);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verViajesPasajeros(){
    var post = "viaje=" + $('#viajes').val();
    $.ajax({
        url: "../ajax/listaDeReporte.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#pasajeros").html(datos);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

