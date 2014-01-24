<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Terminales.php';

$terminales = new Terminales();
$lista = $terminales->getAll();

echo '<tr class="thead1"  valign="middle">'
    .'<th valign="middle" width="10%"><img src="../imagen/terminal-white.png" width="20" height="20" /></th>'
    .'<th valign="middle" width="10%">Id</th>'
    .'<th valign="middle" width="60%">Nombre del Terminal</th>'
    .'<th valign="middle" width="10%">Editar'
    .'</th>'
    .'</tr>';

foreach ($lista as $fila){
echo '<tr class="tr1"  valign="middle">'
    .'<td valign="middle" width="10%"><img src="../imagen/terminal.png" width="20" height="20" /></td>'
    .'<td valign="middle" width="10%">'.$fila['id_terminales_pk'].'</td>'
    .'<td valign="middle" width="60%">'.$fila['descripcion'].'</td>'
    .'<td valign="middle" width="10%">'
    .'<a href="" onclick="verTerminal(' . $fila['id_terminales_pk']. ') ;return false;">'
    .'<img src="../imagen/edit.png" width="20" height="20"/></a> '
    .'<a href="" onclick="eliminarTerminal(' . $fila['id_terminales_pk']. ') ;return false;">'
    .'<img src="../imagen/x.png" width="20" height="20"/></a> '
    .'</td>'
    .'</tr>';
}

?>