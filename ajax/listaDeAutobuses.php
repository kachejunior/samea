<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Autobuses.php';

$autobus = new Autobuses();
$lista = $autobus->getAll();

echo '<tr class="thead1"  valign="middle">'
    .'<th valign="middle" width="10%"><img src="../imagen/bus-white.png" width="40" height="20" /></th>'
    .'<th valign="middle" width="20%">Placa</th>'
    .'<th valign="middle" width="20%">Marca</th>'
    .'<th valign="middle" width="20%">Modelo</th>'
    .'<th valign="middle" width="10%">Asientos</th>'
    .'<th valign="middle" width="10%">Editar</th>'
    .'</tr>';

foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
    .'<td valign="middle" width="10%"><img src="../imagen/bus.png" width="40" height="20" /></td>'
    .'<td valign="middle" width="20%">'.$fila['id_autobuses_placa_pk'].'</td>'
    .'<td valign="middle" width="20%">'.$fila['marca'].'</td>'
    .'<td valign="middle" width="20%">'.$fila['modelo'].'</td>'
    .'<td valign="middle" width="10%">'.$fila['n_asientos'].'</td>'
    .'<td valign="middle" width="10%">'
    .'<a href="#" onclick="verAutobus(\''. $fila['id_autobuses_placa_pk'] .'\'); return false;">'
    .'<img src="../imagen/edit.png" width="20" height="20"/> </a>'
    .'<a href="#" onclick="eliminarAutobus(\''. $fila['id_autobuses_placa_pk'] .'\'); return false;">'
    .'<img src="../imagen/x.png" width="20" height="20"/> </a>'
    .'</td>'
    .'</tr>';
}

?>