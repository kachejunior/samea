<?php

echo'<tr class="thead1" valign="middle">'
     .'<th valign="middle" width="5%"><img src="../imagen/chofer-white.png" width="20" height="20" /></th>'
     .'<th valign="middle" width="10%">Boleto</th>'
     .'<th valign="middle" width="15%">Cedula</th>'
     .'<th valign="middle" width="20%">Nombre</th>'
     .'<th valign="middle" width="20%">Apellido</th>'
     .'<th valign="middle" width="15%">Origen</th>'
     .'<th valign="middle" width="15%">Destino</th>'
     .'</tr>' ; 


if (!isset($_POST['viaje']))
    return false;
require_once '../lib/BaseDatos.php';
require_once '../lib/Viajes.php';

$viaje = new Viajes();
$lista = $viaje->getAllPasajeros($_POST['viaje']);

foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
     .'<td valign="middle" width="5%"><img src="../imagen/chofer.png" width="20" height="20" /></td>'
     .'<td valign="middle" width="10%">'.$fila['boleto'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['cedula'].'</td>'
     .'<td valign="middle" width="20%">'.$fila['nombre'].'</td>'
     .'<td valign="middle" width="20%">'.$fila['apellido'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['origen'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['destino'].'</td>'
     .'</tr>';
}

?>