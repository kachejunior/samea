<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Tramos.php';

$tramos = new Tramos();
$lista = $tramos->getAll();
echo '<option value=""></option>';
foreach ($lista as $fila){
    echo '<option value="'.$fila['id_tramos_pk'].'">'.$fila['id_tramos_pk'].' - '. $fila['origen'].' - '. $fila['destino']
       . ' - '.$fila['precio'].' Bs - '.$fila['tiempo'].' Min</option>';
}
?>