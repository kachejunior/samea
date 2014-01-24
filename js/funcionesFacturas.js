function limpiarFormulario(){
    $("#factura").val('');
    $("#cedula_f").val('');
    $("#nombre_f").val('');
    $("#fecha").val('');
    $("#hora").val('');
}

function verFactura(factura){
	
    var post = "factura=" + factura;
    $.ajax({
        url: "../ajax/verFactura.php",
        data: post,
        dataType: "json",
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#factura").val(datos.id);
            $("#cedula_f").val(datos.cedula);
            $("#nombre_f").val(datos.aNombre);
            $("#fecha").val(datos.fecha);
            $("#hora").val(datos.hora);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function verFacturas(){
    $.ajax({
        url: "../ajax/listaDeFacturas.php",
        data: null,
        processData: 'false',
        type: "POST",
        success: function(datos) {
            $("#facturas").html(datos);
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function guardarFactura(){
    var post = "factura=" + $('#factura').val();
    post = post + "&cedula=" + $('#cedula_f').val();
    post = post + "&nombre=" + $('#nombre_f').val();
    $.ajax({
        url: "../ajax/guardarFactura.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verFacturas();
        },
        error: function() {alert('Se ha producido un error');}
    });
    return true;
}

function eliminarFactura(factura){
    
    var post = "factura=" + factura;
    $.ajax({ 
        url: "../ajax/eliminarFactura.php",
        data: post,
        processData: 'false',
        type: "POST",
        success: function() {
            limpiarFormulario();
            verFacturas();
        },
		
        error: function() {alert('Error al Eliminar el Autobus');}
    });
    return true;
}