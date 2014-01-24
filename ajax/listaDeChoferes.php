<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Choferes.php';

$choferes = new Choferes();
$lista = $choferes->getAll();

echo '<tr class="thead1"  valign="middle">'
    .'<th valign="middle" width="5%"><img src="../imagen/chofer-white.png" width="20" height="20" /></th>'
    .'<th valign="middle" width="15%">Cedula</th>'
    .'<th valign="middle" width="20%">Nombre</th>'
    .'<th valign="middle" width="20%">Apellido</th>'
    .'<th valign="middle" width="15%">Nacimiento</th>'
    .'<th valign="middle" width="15%">Telefono</th>'
    .'<th valign="middle" width="10%">Editar</th>'
    .'</tr>';

foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
    .'<td valign="middle" width="5%"><img src="../imagen/chofer.png" width="20" height="20" /></td>'
    .'<td valign="middle" width="15%">'.$fila['id_choferes_cedula_pk'].'</td>'
    .'<td valign="middle" width="20%">'.$fila['nombre'].'</td>'
    .'<td valign="middle" width="20%">'.$fila['apellido'].'</td>'
    .'<td valign="middle" width="15%">'.$fila['nacimiento'].'</td>'
    .'<td valign="middle" width="15%">'.$fila['telefono'].'</td>'
    .'<td valign="middle" width="10%">'
    .'<a href="?" onclick="verChofer(\''. $fila['id_choferes_cedula_pk'] .'\'); return false;">'
    .'<img src="../imagen/edit.png" width="20" height="20"/></a> '
    .'<a href="?" onclick="eliminarChofer(\''. $fila['id_choferes_cedula_pk'] .'\'); return false;">'
    .'<img src="../imagen/x.png" width="20" height="20"/></a>'
    .'</td>'
    .'</tr>';
}

?>