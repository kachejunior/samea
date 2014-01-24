function limpiarFormulario(){
    $("#id").val('');
    $("#origen").val('');
    $("#destino").val('');
    $("#precio").val('');
    $("#tiempo").val('');
}

function verTramo(id){
    var post = "id=" + id;
    $.ajax({
        url: "../ajax/verTramo.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#id").val(datos.id);
            $("#origen").val(datos.origen);
            $("#destino").val(datos.destino);
            $("#precio").val(datos.precio);
            $("#tiempo").val(datos.tiempo);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verTramos(){
    $.ajax({
        url: "../ajax/listaDeTramos.php",
        data: null,
        processData: 'false',
        type: "GET",
        success: function(datos) {
            $("#tramos").html(datos);

        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function guardarTramo(){
    var post = "id=" + $("#id").val();
    post = post + "&origen=" + $("#origen").val();
    post = post + "&destino=" + $("#destino").val();
    post = post + "&precio=" + $("#precio").val();
    post = post + "&tiempo=" + $("#tiempo").val();
    $.ajax({
        url: "../ajax/guardarTramo.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verTramos();
        },
        error: function() {alert('Error al guardar el Tramo');}
    });
    return true;
}

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

function eliminarTramo(id){
    var post = "id=" + id;
    $.ajax({
        url: "../ajax/eliminarTramo.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verTramos();
        },
        error: function() {alert('Error al eliminar el Tramo');}
    });
    return true;
}
