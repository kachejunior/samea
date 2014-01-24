<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="hojaCss.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="tablas.css" type="text/css" media="all"/>
    <script src="../js/jquery-1.6.2.js" type="text/javascript"></script>
    <script src="../js/funcionesTerminales.js" type="text/javascript"></script>
    <?php include '../ajax/funcionesPhpTerminales.php' ?>
    <title>Registro Terminal</title>
</head>

<body>
    <div class="wrapper">
        <header><a href="index.php">Sistema Administrativo para el Manejo de Empresas de Autobuses</a></header>
		<div class="cuerpo">
       		 <div class="titulo_form">RUTAS DISPONIBLES</div>
                 <div class="formulario" style="height: 60px;">
                  <ul style="margin-left:20px;">
                     <li><strong style="color:#910000;">Origen:  </strong><?php echo  verTerminal($_POST['origen']); ?></li>
                     <li><strong style="color:#910000;">Destino: </strong><?php echo  verTerminal($_POST['destino']); ?></li> 
                     <li><strong style="color:#910000;">Fecha:   </strong><?php echo $_POST['fecha'];?></li> 
                  </ul>
                  </div>
                  <table class="tableta" width="95%" rules="groups" border="4" style="margin-top:10px;">
					<?php 
                        include '../ajax/listaDeRutasDisponibles.php';
                        listaDeRutasDisponibles ($_POST['origen'], $_POST['destino'], $_POST['fecha'] ); 
                     ?>       
             	</table>
    		 </div>
             
        </div>
      
    <footer>Desarrollado por Daniela y Anyelys</footer>
</body>
</html>