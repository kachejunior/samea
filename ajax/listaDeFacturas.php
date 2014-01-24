<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Facturas.php';

$tramos = new Facturas();
$lista = $tramos->getAll();

echo'<tr class="thead1" valign="middle">'
     .'<th valign="middle" width="5%">Id</th>'
     .'<th valign="middle" width="15%">Cedula</th>'
     .'<th valign="middle" width="30%">A Nombre</th>'
     .'<th valign="middle" width="15%">Fecha</th>'
     .'<th valign="middle" width="15%">Hora</th>'
     .'<th valign="middle" width="5%"><img src="../imagen/tramo-white.png" width="20" height="20" /></th>'
     .'<th valign="middle" width="10%">Editar</th>'
     .'</tr>' ; 
foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
     .'<td valign="middle" width="5%">'.$fila['id_facturas_pk'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['cedula'].'</td>'
     .'<td valign="middle" width="30%">'.$fila['a_nombre'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['fecha'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['hora'].'</td>'
     .'<td valign="middle" width="5%">'
     .'<a href="pasajeroBoletos.php?factura='.$fila['id_facturas_pk'].'" >'
     .'<img src="../imagen/tramo.png" width="20" height="20" /></a> '
     .'</td>'
     .'<td valign="middle" width="10%">'
     .'<a href="?" onclick="verFactura('. $fila['id_facturas_pk'] .'); return false;">'
     .'<img src="../imagen/edit.png" width="20" height="20"/></a> '
     .'<a href="?" onclick="eliminarFactura('.$fila['id_facturas_pk'] .'); return false;">'
     .'<img src="../imagen/x.png" width="20" height="20"/></a>'
     .'</td>'
     .'</tr>';
}

?>