function limpiarFormulario(){
    $("#id").val('');
    $("#autobus").val('');
    $("#chofer").val('');
    $("#asientos").val('');
    $("#fecha").val('');
}

function verViaje(id){
    var post = "id=" + id;
    $.ajax({
        url: "../ajax/verViaje.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#id").val(datos.id);
            $("#autobus").val(datos.autobus);
            $("#chofer").val(datos.chofer);
            $("#asientos").val(datos.asientos);
            $("#fecha").val(datos.fecha);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verViajes(){
    $.ajax({
        url: "../ajax/listaDeViajes.php",
        data: null,
        processData: 'false',
        type: "GET",
        success: function(datos) {
            $("#viajes").html(datos);

        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function guardarViaje(){
    var post = "id=" + $("#id").val();
    post = post + "&autobus=" + $("#autobus").val();
    post = post + "&chofer=" + $("#chofer").val();
    post = post + "&fecha=" + $("#fecha").val();
    $.ajax({
        url: "../ajax/guardarViaje.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verViajes();
        },
        error: function() {alert('Error al guardar el Viaje');}
    });
    return true;
}

function eliminarViaje(id){
    var post = "id=" + id;
    $.ajax({
        url: "../ajax/eliminarViaje.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verViajes();
        },
        error: function() {alert('Error al eliminar el Viaje');}
    });
    return true;
}
