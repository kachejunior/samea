function limpiarFormulario(){
    $("#id").val('');
    $("#descripcion").val('');
}

function verTerminal(id){
    var post = "id=" + id;
    $.ajax({
        url: "../ajax/verTerminal.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#id").val(datos.id);
            $("#descripcion").val(datos.descripcion);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verTerminales(){
    $.ajax({
        url: "../ajax/listaDeTerminales.php",
        data: null,
        processData: 'false',
        type: "GET",
        success: function(datos) {
            $("#terminales").html(datos);

        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function guardarTerminal(){
    var post = "id=" + $("#id").val();
    post = post + "&descripcion=" + $("#descripcion").val();
    $.ajax({
        url: "../ajax/guardarTerminal.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verTerminales();
        },
        error: function() {alert('Error al guardar el terminal');}
    });
    return true;
}

function eliminarTerminal(id){
    var post = "id=" + id;
    $.ajax({
        url: "../ajax/eliminarTerminal.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verTerminales();
        },
        error: function() {alert('Error al eliminar el terminal');}
    });
    return true;
}
