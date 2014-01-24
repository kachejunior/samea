<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Tramos.php';

$tramos = new Tramos();
$lista = $tramos->getAll();

echo'<tr class="thead1" valign="middle">'
     .'<th valign="middle" width="5%"><img src="../imagen/tramo-white.png" width="20" height="20" /></th>'
     .'<th valign="middle" width="5%">Id</th>'
     .'<th valign="middle" width="30%">Origen</th>'
     .'<th valign="middle" width="30%">Destino</th>'
     .'<th valign="middle" width="10%">Precio(Bs)</th>'
     .'<th valign="middle" width="10%">T(Min)</th>'
     .'<th valign="middle" width="10%">Editar</th>'
     .'</tr>' ; 
foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
     .'<td valign="middle" width="5%"><img src="../imagen/tramo.png" width="20" height="20" /></td>'
     .'<td valign="middle" width="5%">'.$fila['id_tramos_pk'].'</td>'
     .'<td valign="middle" width="30%">'.$fila['origen'].'</td>'
     .'<td valign="middle" width="30%">'.$fila['destino'].'</td>'
     .'<td valign="middle" width="10%">'.$fila['precio'].'</td>'
     .'<td valign="middle" width="10%">'.$fila['tiempo'].'</td>'
     .'<td valign="middle" width="10%">'
     .'<a href="?" onclick="verTramo('. $fila['id_tramos_pk'] .'); return false;">'
     .'<img src="../imagen/edit.png" width="20" height="20"/></a> '
     .'<a href="?" onclick="eliminarTramo('. $fila['id_tramos_pk'] .'); return false;">'
     .'<img src="../imagen/x.png" width="20" height="20"/></a>'
     .'</td>'
     .'</tr>';
}

?>