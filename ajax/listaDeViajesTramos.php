<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/ViajesTramos.php';

$viajes = new ViajesTramos();
$lista = $viajes->getAllViaje($_GET['viaje']);

echo'<tr class="thead1" valign="middle">'
     .'<th valign="middle" width="5%"><img src="../imagen/tramo-white.png" width="20" height="20" /></th>'
     .'<th valign="middle" width="10%">Viaje</th>'
     .'<th valign="middle" width="60%">Tramo</th>'
     .'<th valign="middle" width="10%">Hora</th>'
     .'<th valign="middle" width="15%">Editar</th>'
     .'</tr>' ; 
foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
     .'<td valign="middle" width="5%">'
     .'<img src="../imagen/tramo.png" width="20" height="20"/></a></td>'
     .'<td valign="middle" width="10%">'.$fila['id_viajes_pfk'].'</td>'
     .'<td valign="middle" width="60%">'.$fila['origen'].' - '.$fila['destino'].'</td>'
     .'<td valign="middle" width="10%">'.$fila['hora_salida'].'</td>'
     .'<td valign="middle" width="15%">'
     .'<a href="?" onclick="verViajeTramo('.$fila['id_tramos_pfk'].'); return false;">'
     .'<img src="../imagen/edit.png" width="20" height="20"/></a> '
     .'<a href="?" onclick="eliminarViajeTramo('.$fila['id_tramos_pfk'].'); return false;">'
     .'<img src="../imagen/x.png" width="20" height="20"/></a>'
     .'</td>'
     .'</tr>';
}

?>