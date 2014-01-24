<?php
echo '<thead class="thead1"  valign="middle">'
    .'<th valign="middle" width="5%"><img src="../imagen/chofer-white.png" width="20" height="20" /></th>'
    .'<th valign="middle" width="15%">Cedula</th>'
    .'<th valign="middle" width="20%">Nombre</th>'
    .'<th valign="middle" width="20%">Apellido</th>'
    .'<th valign="middle" width="15%">Nacimiento</th>'
    .'<th valign="middle" width="15%">Telefono</th>'
    .'<th valign="middle" width="10%">Editar</th>'
    .'</thead>';

require_once '../lib/BaseDatos.php';
require_once '../lib/Pasajeros.php';

$pasajeros = new Pasajeros();
$lista = $pasajeros->getAll();

foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
    .'<td valign="middle" width="5%"><img src="../imagen/chofer.png" width="20" height="20" /></td>'
    .'<td valign="middle" width="15%">'.$fila['id_pasajero_cedula_pk'].'</td>'
    .'<td valign="middle" width="20%">'.$fila['nombre'].'</td>'
    .'<td valign="middle" width="20%">'.$fila['apellido'].'</td>'
    .'<td valign="middle" width="15%">'.$fila['nacimiento'].'</td>'
    .'<td valign="middle" width="15%">'.$fila['telefono'].'</td>'
    .'<td valign="middle" width="10%">'
    .'<a href="?" onclick="verPasajero(\''. $fila['id_pasajero_cedula_pk'] .'\'); return false;">'
    .'<img src="../imagen/edit.png" width="20" height="20"/></a> '
    .'<a href="?" onclick="eliminarPasajero(\''. $fila['id_pasajero_cedula_pk'] .'\'); return false;">'
    .'<img src="../imagen/x.png" width="20" height="20"/></a>'
    .'</td>'
    .'</tr>';
}

?>