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
    <script src="../js/funcionesChoferes.js" type="text/javascript"></script>
    <title>Registro Chofer</title>
</head>

<body>
    <div class="wrapper">
        <header><a href="index.php">Sistema Administrativo para el Manejo de Empresas de Autobuses</a></header>
        <?php include 'menu.php'?>
	<div class="cuerpo">
            <div class="titulo_form">REGISTRO DE CHOFERES</div>
            <form onsubmit="guardarChofer(); return false;">
                <div class="formulario" style="height: 80px;">
                <div class="datos">
                    <input type="hidden" id="cedula_vieja"/>
                    <div  class="campo">
                        <label>Cedula: </label>
                        <input type="text" id="cedula" maxlength="12" style="width: 100px;" required="required" placeholder="Cedula"/>
                    </div>
                    <div  class="campo">
                        <label>Nombre: </label>
                        <input type="text" id="nombre" maxlength="30" style="width: 150px;" required="required" placeholder="Nombre"/>
                    </div>
                    <div  class="campo">
                        <label>Apellido: </label>
                        <input type="text" id="apellido" maxlength="30" style="width: 150px;" required="required" placeholder="Apellido" />
                    </div>
                    <div  class="campo">
                        <label>Fecha de Nacimiento: </label>
                        <input type="date" id="nacimiento" required="required" placeholder="F. Nacimiento" style="width: 100px;" />
                    </div>
                    <div  class="campo">
                        <label>Telefono: </label>
                        <input type="text" id="telefono" maxlength="12" style="width: 150px;" required="required" placeholder="Telefono" />
                    </div>
                </div>
                <input type="submit" value="Guardar" class="guardar"/>
                </div>
            </form>
            <table class="tableta" id="choferes"> 
                <?php include '../ajax/listaDeChoferes.php';?>
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
    cal.manageFields("nacimiento", "nacimiento","%d-%m-%Y");
//]]></script>