function limpiarFormulario(){
    $("#cedula_vieja").val('');
    $("#cedula").val('');
    $("#nombre").val('');
    $("#apellido").val('');
    $("#nacimiento").val('');
    $("#telefono").val('');
    $("#cedula").attr('disabled',null);
}

function verChofer(cedula){
    var post = "cedula=" + cedula;
    $.ajax({
        url: "../ajax/verChofer.php",
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

function verChoferes(){
    $.ajax({
        url: "../ajax/listaDeChoferes.php",
        data: null,
        processData: 'false',
        type: "GET",
        success: function(datos) {
            $("#choferes").html(datos);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function guardarChofer(){
    var post = "cedula=" + $("#cedula").val();
    post = post + "&cedula_vieja=" + $("#cedula_vieja").val();
    post = post + "&nombre=" + $("#nombre").val();
    post = post + "&apellido=" + $("#apellido").val();
    post = post + "&nacimiento=" + $("#nacimiento").val();
    post = post + "&telefono=" + $("#telefono").val();
    $.ajax({
        url: "../ajax/guardarChofer.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verChoferes();
        },
        error: function() {alert('Error al guardar el Chofer');}
    });
    return true;
}

function eliminarChofer(cedula){
    var post = "cedula=" + cedula;
    $.ajax({
        url: "../ajax/eliminarChofer.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verChoferes();
        },
        error: function() {alert('Error al intentar eliminar el Chofer');}
    });
    return true;
}
