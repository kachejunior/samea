<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="hojaCss.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="tablas.css" type="text/css" media="all"/>
    <script src="../js/jquery-1.6.2.js" type="text/javascript"></script>
    <script src="../js/funcionesAutobuses.js" type="text/javascript"></script>
    <title>Registro Buses</title>
</head>

<body>
    <div class="wrapper">
        <header><a href="index.php">Sistema Administrativo para el Manejo de Empresas de Autobuses</a></header>
        <?php include 'menu.php'?>
	<div class="cuerpo">
            <div class="titulo_form">REGISTRO DE AUTOBUSES</div>
            <form onsubmit="guardarAutobus(); return false;">
                <div class="formulario" style="height: 80px;">
                <div class="datos">
                    <input type="hidden" id="placa_vieja"/>
                    <div  class="campo">
                        <label>Placa: </label>
                        <input type="text" id="placa" maxlength="12" style="width: 150px;" required="required" placeholder="Placa"/>
                    </div>
                    <div  class="campo">
                        <label>Marca: </label>
                        <input type="text" id="marca" maxlength="30" style="width: 150px;" required="required" placeholder="Marca"/>
                    </div>
                    <div  class="campo">
                        <label>Modelo: </label>
                        <input type="text" id="modelo" maxlength="30" style="width: 150px;" required="required" placeholder="Modelo" />
                    </div>
                    <div  class="campo">
                        <label>Asientos: </label>
                        <input type="number" id="asientos" min="1" max="200" required="required" placeholder="Nro Asientos" style="width: 150px;" />
                    </div>
                </div>
                <input type="submit" value="Guardar" class="guardar"/>
                </div>
            </form>
            <table class="tableta" id="autobuses"> 
                <?php include '../ajax/listaDeAutobuses.php';?>
            </table>
        </div>
    </div>
    <footer>Desarrollado por Daniela y Anyelys</footer>
</body>
</html>