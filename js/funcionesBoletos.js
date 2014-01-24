function limpiarFormulario(){
    $("#cedula").val('');
    $("#nombre").val('');
    $("#apellido").val('');
    $("#nacimiento").val('');
    $("#telefono").val('');
    $("#origen").val('');
    $("#destino").val('');
    $("#fecha").val('');
    $("#boleto").val('');
    consultarViajes();
    $("#viajes").val('');
    
}

function verPasajero(){
    var post = "cedula=" + $("#cedula").val();
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
        },
        error: function() {alert('Se ha producido un error');}
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

function consultarViajes(){
    if(($('#origen').val()=='') || ($('#destino').val()=='') || ($('#fecha').val()=='')){
        $("#viajes").html("<option><option>");
        return false;
    }
    var post = "origen=" + $('#origen').val();
    post = post + "&destino=" + $('#destino').val();
    post = post + "&fecha=" + $('#fecha').val();
    $.ajax({
        url: "../ajax/listaDeBoletosViajesTramos.php",
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
function consultarViajes2(id){
    var post = "origen=" + $('#origen').val();
    post = post + "&destino=" + $('#destino').val();
    post = post + "&fecha=" + $('#fecha').val();
    $.ajax({
        url: "../ajax/listaDeBoletosViajesTramos.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#viajes").html(datos);
            $("#viajes").val(id);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}


function verBoletos(){
    var post = "factura=" + $('#factura').val();
    $.ajax({
        url: '../ajax/listaDeBoletos.php',
        data: post,
        processData: 'false',
        type: "GET",
        success: function(datos) {
            $("#boletos").html(datos);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verTramo(id,viaje){
    var post = "id=" + id;
    var val = viaje + ':' + id;
    $.ajax({
        url: "../ajax/verTramo.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#origen").val(datos.origen);
            $("#destino").val(datos.destino);
            consultarViajes2(val);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verViaje(id,tramo){
    var post = "id=" + id;
    $.ajax({
        url: "../ajax/verViaje.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#fecha").val(datos.fecha);
            verTramo(tramo, id);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}


function verBoleto(id){
    var post = "boleto=" + id;
    $.ajax({
        url: "../ajax/verBoleto.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#boleto").val(id);
            $("#cedula").val(datos.cedula);
            verViaje(datos.viaje, datos.tramo);
            verPasajero();
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function guardarBoleto(){
    var post = "viajes=" + $("#viajes").val();
    post = post + "&factura=" + $("#factura").val();
    post = post + "&boleto=" + $("#boleto").val();
    post = post + "&cedula=" + $("#cedula").val();
    $.ajax({
        url: "../ajax/guardarBoleto.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function(a) {
            limpiarFormulario();
            verBoletos();
        },
        error: function() {alert('Error al guardar el Boleto');}
    });
    return true;
}


function guardarPasajero(){
    var post = "cedula=" + $("#cedula").val();
    post = post + "&cedula_vieja=" + $("#cedula").val();
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
            guardarBoleto();
        },
        error: function() {alert('Error al guardar el Pasajero');}
    });
    return true;
}

function eliminarBoleto(id){
    var post = "id=" + id;
    $.ajax({
        url: "../ajax/eliminarBoleto.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verBoletos();
        },
        error: function() {alert('Error al eliminar el boleto');}
    });
    return true;
}
