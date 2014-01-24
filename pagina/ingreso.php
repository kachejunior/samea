<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="hojaCss.css" type="text/css" media="all">
<title>Consulta</title>
<style>
select, input{
	width:150px;
	border-radius:20px;
	text-align:center;
	}
input:hover{
	background:#CCC;
	}/* CSS Document */

</style>
</head>

<body>
	<div class="cabezera">Cabezera</div>
	<div class="cuerpo">
		<div class="contenido">
			<div class="login-content"></div>
            <div class="login">
             <strong style="margin-left:20px; position:relative; top:20px; color:#910000;">CONSULTA</strong>
             <form action="rutasDisponibles.php">
             <table style="margin-left:25px;  position:relative; top:20px" width="200">
  				<tr>
    				<td>Origen</td>
    				<td><select></select></td>
 				</tr>
  				<tr>
    				<td>Destino</td>
    				<td><select></select></td>
  				</tr>
  				<tr>
    				<td>Fecha</td>
    				<td><input type="text" name="fecha" id="fecha" /></td>
  				</tr>
                <tr>
    				<td></td>
    				<td><input type="submit" value="Solicitar"/></td>
  				</tr>
		     </table>

             </form>
            </div>
		</div>
	</div>
</body>

</html>