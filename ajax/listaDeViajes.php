<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Viajes.php';

$viajes = new Viajes();
$lista = $viajes->getAll();

echo'<tr class="thead1" valign="middle">'
     .'<th valign="middle" width="5%">Id</th>'
     .'<th valign="middle" width="30%">Autobus</th>'
     .'<th valign="middle" width="30%">Chofer</th>'
     .'<th valign="middle" width="5%">A. Disp.</th>'
     .'<th valign="middle" width="15%">Fecha</th>'
     .'<th valign="middle" width="5%"><img src="../imagen/tramo-white.png" width="20" height="20" /></th>'
     .'<th valign="middle" width="10%">Editar</th>'
     .'</tr>' ; 
foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
     .'<td valign="middle" width="5%">'.$fila['id_viajes_pk'].'</td>'
     .'<td valign="middle" width="30%">'.$fila['id_autobuses_placa_fk'].'</td>'
     .'<td valign="middle" width="30%">'.$fila['id_choferes_cedula_fk'].'</td>'
     .'<td valign="middle" width="5%">'.$fila['asientos_disponibles'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['fecha'].'</td>'
     .'<td valign="middle" width="5%"><a href="formularioRegistroViajesTramos.php?viaje='
     . $fila['id_viajes_pk'] .'" title="Editar Tramos del Viaje">'
     .'<img src="../imagen/tramo.png" width="20" height="20"/></a></td>'
     .'<td valign="middle" width="10%">'
     .'<a href="?" onclick="verViaje('. $fila['id_viajes_pk'] .'); return false;">'
     .'<img src="../imagen/edit.png" width="20" height="20"/></a> '
     .'<a href="?" onclick="eliminarViaje('. $fila['id_viajes_pk'] .'); return false;">'
     .'<img src="../imagen/x.png" width="20" height="20"/></a>'
     .'</td>'
     .'</tr>';
}

?>