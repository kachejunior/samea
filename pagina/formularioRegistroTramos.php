<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="hojaCss.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="tablas.css" type="text/css" media="all"/>
    <script src="../js/jquery-1.6.2.js" type="text/javascript"></script>
    <script src="../js/funcionesTramos.js" type="text/javascript"></script>
    <title>Registro Tramo</title>
</head>

<body>
    <div class="wrapper">
        <header><a href="index.php">Sistema Administrativo para el Manejo de Empresas de Autobuses</a></header>
        <?php include 'menu.php'?>
	<div class="cuerpo">
            <div class="titulo_form">REGISTRO DE TRAMOS</div>
            <form onsubmit="guardarTramo(); return false;" >
                <div class="formulario" style="height: 80px;">
                <div class="datos">
                    <input type="hidden" id="id"/>
                    <div  class="campo">
                        <label>Origen: </label>
                        <select id="origen" onchange="actualizarDestino();" style="width: 250px;" required="required">
                        <?php include '../ajax/selectTerminal.php'; ?></select>
                    </div>
                    <div  class="campo">
                        <label>Destino: </label>
                        <select id="destino" style="width: 250px;" required="required">
                        <?php include '../ajax/selectTerminal.php'; ?></select>
                    </div>
                    <div  class="campo">
                        <label>Precio: </label>
                        <input type="number" id="precio" min="0" required="required" placeholder="Precio" style="width: 80px;" /> (Bs)
                    </div>
                    <div  class="campo">
                        <label>Tiempo: </label>
                        <input type="number" id="tiempo" min="0" required="required" placeholder="Tiempo" style="width: 80px;" /> (Min)
                    </div>
                </div>
                <input type="submit" value="Guardar" class="guardar"/>
                </div>
            </form>
            <table class="tableta" id="tramos"> 
                <?php include '../ajax/listaDeTramos.php';?>
            </table>
        </div>
    </div>
    <footer>Desarrollado por Daniela y Anyelys</footer>
</body>
</html>