function limpiarFormulario(){
    $("#tramo").val('');
    $("#hora").val('');
    $("#tramo_viejo").val('');
}

function verViajeTramo(tramo){
    var post = "viaje=" + $('#viaje').val();
    post = post + "&tramo=" +tramo;
    $.ajax({
        url: "../ajax/verViajeTramo.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#tramo").val(datos.tramo);
            $("#hora").val(datos.hora);
            $("#tramo_viejo").val(datos.tramo);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verViajesTramos(){
    var post = "viaje=" + $("#viaje").val();
    $.ajax({
        data:post,
        url: "../ajax/listaDeViajesTramos.php",
        processData: 'false',
        type: "GET",
        success: function(datos) {
            $("#viajestramos").html(datos);

        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function guardarViajeTramo(){
    var post = "viaje=" + $("#viaje").val();
    post = post + "&tramo=" + $("#tramo").val();
    post = post + "&hora=" + $("#hora").val();
    post = post + "&tramo_viejo=" + $("#tramo_viejo").val();
    $.ajax({
        url: "../ajax/guardarViajeTramo.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verViajesTramos();
        },
        error: function() {alert('Error al guardar el Viaje');}
    });
    return true;
}

function eliminarViajeTramo(tramo){
    var post = "viaje=" + $('#viaje').val();
    post = post + "&tramo=" + tramo;
    $.ajax({
        url: "../ajax/eliminarViajeTramo.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verViajesTramos();
        },
        error: function() {alert('Error al eliminar el Viaje');}
    });
    return true;
}