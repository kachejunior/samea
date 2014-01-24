l<?php

echo'<tr class="thead1" valign="middle">'
     .'<th valign="middle" width="5%"><img src="../imagen/chofer-white.png" width="20" height="20" /></th>'
     .'<th valign="middle" width="10%">Boleto</th>'
     .'<th valign="middle" width="10%">Viaje</th>'
     .'<th valign="middle" width="15%">Cedula</th>'
     .'<th valign="middle" width="20%">Nombre</th>'
     .'<th valign="middle" width="15%">Origen</th>'
     .'<th valign="middle" width="15%">Destino</th>'
     .'<th valign="middle" width="10%">Editar</th>'
     .'</tr>' ; 


//if (!isset($_GET['factura']))
//    return false;
require_once '../lib/BaseDatos.php';
require_once '../lib/Boletos.php';

$boleto = new Boletos();
$lista = $boleto->getAllFactura($_GET['factura']);

foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
     .'<td valign="middle" width="5%"><img src="../imagen/chofer.png" width="20" height="20" /></td>'
     .'<td valign="middle" width="10%">'.$fila['boleto'].'</td>'
     .'<td valign="middle" width="10%">'.$fila['viaje'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['cedula'].'</td>'
     .'<td valign="middle" width="20%">'.$fila['apellido'].' '.$fila['nombre'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['origen'].'</td>'
     .'<td valign="middle" width="15%">'.$fila['destino'].'</td>'
    .'<td valign="middle" width="10%">'
    .'<a href="#" onclick="verBoleto(\''. $fila['boleto'] .'\'); return false;">'
    .'<img src="../imagen/edit.png" width="20" height="20"/> </a>'
    .'<a href="#" onclick="eliminarBoleto(\''. $fila['boleto'] .'\'); return false;">'
    .'<img src="../imagen/x.png" width="20" height="20"/> </a>'
    .'</td>'
     .'</tr>';
}

?>