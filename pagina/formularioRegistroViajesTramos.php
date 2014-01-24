<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="hojaCss.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="tablas.css" type="text/css" media="all"/>
    <script src="../js/jquery-1.6.2.js" type="text/javascript"></script>
    <script src="../js/funcionesViajesTramos.js" type="text/javascript"></script>
    <title>Registro Viaje</title>
</head>

<body>
    <div class="wrapper">
        <header><a href="index.php">Sistema Administrativo para el Manejo de Empresas de Autobuses</a></header>
        <?php include 'menu.php'?>
	<div class="cuerpo">
            <div class="titulo_form">REGISTRO DE TRAMOS PARA EL VIAJE (<?php echo $_GET['viaje'];?>)</div>
            <form onsubmit="guardarViajeTramo(); return false;" >
                <div class="formulario" style="height: 40px;">
                <div class="datos">
                    <input type="hidden" id="viaje" value="<?php echo $_GET['viaje'];?>"/>
                    <input type="hidden" id="tramo_viejo"/>
                    <div  class="campo">
                        <label>Tramo: </label>
                        <select id="tramo" style="width: 450px;" required="required">
                        <?php include '../ajax/selectTramos.php'; ?></select>
                    </div>
                    <div  class="campo">
                        <label>Hora: </label>
                        <input type="text" id="hora" required="required" placeholder="12:00:00" maxlength="8" style="width: 100px;" />
                    </div>
                </div>
                <input type="submit" value="Guardar" class="guardar"/>
                </div>
            </form>
            <table class="tableta" id="viajestramos"> 
                <?php include '../ajax/listaDeViajesTramos.php';?>
            </table>
        </div>
    </div>
    <footer>Desarrollado por Daniela y Anyelys</footer>
</body>
</html>
