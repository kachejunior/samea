<?php

echo'<tr class="thead1" valign="middle">'
     .'<th valign="middle" width="5%"><img src="../imagen/tramo-white.png" width="20" height="20" /></th>'
     .'<th valign="middle" width="5%">Viaje</th>'
     .'<th valign="middle" width="25%">Origen</th>'
     .'<th valign="middle" width="25%">Destino</th>'
     .'<th valign="middle" width="15%">Precio(Bs)</th>'
     .'<th valign="middle" width="15%">Salida</th>'
     .'<th valign="middle" width="10%">A. Disp.</th>'
     .'</tr>' ; 


if (!isset($_POST['fecha']) || !isset($_POST['origen']) || !isset($_POST['destino']))
    return false;
require_once '../lib/BaseDatos.php';
require_once '../lib/ViajesTramos.php';

$tramos = new ViajesTramos();
$lista = $tramos->getAllFechaOD($_POST['fecha'], $_POST['origen'], $_POST['destino']);

foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
     .'<td valign="middle" width="5%"><img src="../imagen/tramo.png" width="20" height="20" /></td>'
     .'<td valign="middle" width="5%">'.$fila['id_viajes_pfk'].'</td>'
     .'<td valign="middle" width="25%">'.$fila['origen'].'</td>'
     .'<td valign="middle" width="25%">'.$fila['destino'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['precio'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['hora_salida'].'</td>'
     .'<td valign="middle" width="10%">'.$fila['asientos_disponibles'].'</td>'
     .'</tr>';
}

?>