<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="hojaCss.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="tablas.css" type="text/css" media="all"/>
    <script src="../js/jquery-1.6.2.js" type="text/javascript"></script>
    <script src="../js/funcionesTerminales.js" type="text/javascript"></script>
    <title>Registro Terminal</title>
</head>

<body>
    <div class="wrapper">
        <header><a href="index.php">Sistema Administrativo para el Manejo de Empresas de Autobuses</a></header>
        <?php include 'menu.php'?>
	<div class="cuerpo">
            <div class="titulo_form">REGISTRO DE TERMINALES</div>
            <form onsubmit="guardarTerminal(); return false;">
                <div class="formulario" style="height: 40px;">
                <div class="datos">
                    <input type="hidden" id="id"/>
                    <div class="campo">
                        <label>Nombre de Terminal: </label>
                        <input type="text" id="descripcion" maxlength="50" style="width: 500px;" required="required" placeholder="Nombre del Terminal" />
                    </div>
                </div>
                <input type="submit" value="Guardar" class="guardar"/>
                </div>
            </form>
            <table class="tableta" id="terminales">
                <?php include '../ajax/listaDeTerminales.php'; ?>
            </table>
        </div>
    </div>
    <footer>Desarrollado por Daniela y Anyelys</footer>
</body>
</html>