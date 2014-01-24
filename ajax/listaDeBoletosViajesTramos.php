<?php

if (!isset($_POST['fecha']) || !isset($_POST['origen']) || !isset($_POST['destino'])){
    echo'<option></option>' ; 
    return false;
}
require_once '../lib/BaseDatos.php';
require_once '../lib/ViajesTramos.php';

$tramos = new ViajesTramos();
$lista = $tramos->getAllFechaOD($_POST['fecha'], $_POST['origen'], $_POST['destino']);

foreach ($lista as $fila){
echo '<option value ="'.$fila['id_viajes_pfk'].':'.$fila['id_tramos_pfk'].'">'
     .'Viaje: '.$fila['id_viajes_pfk']
     .', de: '.$fila['origen']
     .', a: '.$fila['destino']
     .', por: '.$fila['precio']
     .' Bs, a las:'.$fila['hora_salida']
     .', Disp: '.$fila['asientos_disponibles']
     .' puestos</option>';
}

?>