function limpiarFormulario(){
    $("#placa_vieja").val('');
    $("#placa").val('');
    $("#marca").val('');
    $("#modelo").val('');
    $("#asientos").val('');
    $("#placa").attr('disabled',null);
}

function verAutobus(placa){
    var post = "placa=" + placa;
    $.ajax({
        url: "../ajax/verAutobus.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#placa_vieja").val(datos.placa);
            $("#placa").val(datos.placa);
            $("#marca").val(datos.marca);
            $("#modelo").val(datos.modelo);
            $("#asientos").val(datos.asientos);
            $("#placa").attr('disabled','disabled');
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verAutobuses(){
    $.ajax({
        url: "../ajax/listaDeAutobuses.php",
        data: null,
        processData: 'false',
        type: "GET",
        success: function(datos) {
            $("#autobuses").html(datos);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function guardarAutobus(){
    var post = "placa=" + $("#placa").val();
    post = post + "&placa_vieja=" + $("#placa_vieja").val();
    post = post + "&marca=" + $("#marca").val();
    post = post + "&modelo=" + $("#modelo").val();
    post = post + "&asientos=" + $("#asientos").val();
    $.ajax({
        url: "../ajax/guardarAutobus.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verAutobuses();
        },
        error: function() {alert('Error al guardar el Autobus');}
    });
    return true;
}

function eliminarAutobus(placa){
    var post = "placa=" + placa;
    $.ajax({
        url: "../ajax/eliminarAutobus.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verAutobuses();
        },
        error: function() {alert('Error al Eliminar el Autobus');}
    });
    return true;
}