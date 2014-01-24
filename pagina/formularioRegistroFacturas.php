<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="hojaCss.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="tablas.css" type="text/css" media="all"/>
    <script src="../js/jquery-1.6.2.js" type="text/javascript"></script>
    <script src="../js/funcionesFacturas.js" type="text/javascript"></script>
    <title>Registro Facturas</title>
</head>

<body>
    <div class="wrapper">
        <header><a href="index.php">Sistema Administrativo para el Manejo de Empresas de Autobuses</a></header>
        <?php include 'menu.php'?>
	<div class="cuerpo">
            <div class="titulo_form">REGISTRO DE FACTURAS</div>
            <form onsubmit="guardarTramo(); return false;" >
                <div class="formulario" style="height: 120px;">
                <div class="datos">
                    <input type="hidden" id="id"/>
                    <div  class="campo">
                        <label>Cedula: </label>
                        <input type="text" id="cedula" maxlength="12" style="width: 100px;" required="required" placeholder="Cedula"/>
                    </div>
                    <div  class="campo">
                        <label>Nombre: </label>
                        <input type="text" id="nombre" maxlength="40" style="width: 150px;" required="required" placeholder="Nombre"/>
                    </div>
                </div>
                <input type="submit" value="Guardar" class="guardar"/>
                </div>
            </form>
            <table class="tableta" id="facturas"> 
                <?php include '../ajax/listaDeFacturas.php';?>
            </table>
        </div>
    </div>
    <footer>Desarrollado por Daniela y Anyelys</footer>
</body>
</html>