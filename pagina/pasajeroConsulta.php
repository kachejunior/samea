<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="hojaCss.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="tablas.css" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="../src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/steel/steel.css" />

    <script src="../src/js/jscal2.js" type="text/javascript"></script>
    <script src="../src/js/lang/es.js" type="text/javascript"></script>
    <script src="../js/jquery-1.6.2.js" type="text/javascript"></script>
    <script src="../js/funcionesConsulta.js" type="text/javascript"></script>
    <title>Registro Pasajero</title>
</head>

<body>
    <div class="wrapper">
        <header><a href="index.php">Sistema Administrativo para el Manejo de Empresas de Autobuses</a></header>
        <?php include 'menu2.php'?>
	<div class="cuerpo">
            <div class="titulo_form">CONSULTA DE VIAJES</div>
            <form onsubmit="consultarViajes(); return false;">
                <div class="formulario" style="height: 80px;">
                <div class="datos">
                    <div  class="campo">
                        <label>Origen: </label>
                        <select id="origen" onchange="actualizarDestino();" style="width:250px;" required="required" style="width: 200px;">
                            <?php include '../ajax/selectTerminal.php'?></select>
                    </div>
                    <div  class="campo">
                        <label>Destino: </label>
                        <select id="destino" style="width:250px;" required="required" style="width: 200px;">
                            <?php include '../ajax/selectTerminal.php'?></select>
                    </div>
                    <div  class="campo">
                        <label>Fecha: </label>
                        <input type="text" id="fecha" maxlength="10" style="width: 150px;" required="required" placeholder="Fecha" />
                    </div>
                </div>
                <input type="submit" value="Consultar" class="guardar"/>
                </div>
            </form>
            <table class="tableta" id="viajes"> 
                <?php include '../ajax/listaDeConsulta.php';?>
            </table>
        </div>
    </div>
    <footer>Desarrollado por Daniela y Anyelys</footer>
</body>
</html>
<script type="text/javascript">//<![CDATA[

    var cal = Calendar.setup({
        selectionType : Calendar.SEL_MULTIPLE,
        selection     : Calendar.dateToInt(new Date()),
    onSelect      : function(c) {
        var count = this.selection.countDays();
        if (count == 1) {
            var date = this.selection.get()[0];
            date = Calendar.intToDate(date);
            date = Calendar.printDate(date, "%d-%m-%Y");
            this.innerHTML = date;
            c.hide();
        } else {
            this.innerHTML = Calendar.formatString("${count:no date|one date|two dates|# dates} selected", { count: count });
        }
    },
        showTime: false
        
    });
    cal.manageFields("fecha", "fecha","%d-%m-%Y");
//]]></script>
