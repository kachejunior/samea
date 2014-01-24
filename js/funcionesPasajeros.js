function limpiarFormulario(){
    $("#cedula_vieja").val('');
    $("#cedula").val('');
    $("#nombre").val('');
    $("#apellido").val('');
    $("#nacimiento").val('');
    $("#telefono").val('');
    $("#cedula").attr('disabled',null);
}

function verPasajero(cedula){
    var post = "cedula=" + cedula;
    $.ajax({
        url: "../ajax/verPasajero.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#cedula_vieja").val(datos.cedula);
            $("#cedula").val(datos.cedula);
            $("#nombre").val(datos.nombre);
            $("#apellido").val(datos.apellido);
            $("#nacimiento").val(datos.nacimiento);
            $("#telefono").val(datos.telefono);
            $("#cedula").attr('disabled',null);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verPasajeros(){
    $.ajax({
        url: "../ajax/listaDePasajeros.php",
        data: null,
        processData: 'false',
        type: "GET",
        success: function(datos) {
            $("#pasajeros").html(datos);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function guardarPasajero(){
    var post = "cedula=" + $("#cedula").val();
    post = post + "&cedula_vieja=" + $("#cedula_vieja").val();
    post = post + "&nombre=" + $("#nombre").val();
    post = post + "&apellido=" + $("#apellido").val();
    post = post + "&nacimiento=" + $("#nacimiento").val();
    post = post + "&telefono=" + $("#telefono").val();
    $.ajax({
        url: "../ajax/guardarPasajero.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verPasajeros();
        },
        error: function() {alert('Error al guardar el Pasajero');}
    });
    return true;
}

function eliminarPasajero(cedula){
    var post = "cedula=" + cedula;
    $.ajax({
        url: "../ajax/eliminarPasajero.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verPasajeros();
        },
        error: function() {alert('Error al intentar eliminar el Pasajero');}
    });
    return true;
}
