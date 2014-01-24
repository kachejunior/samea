<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Viajes.php';
echo '<option value=""></option>';
if (!isset($_POST['fecha']))
    return false;
$viajes = new Viajes();
$lista = $viajes->getAllFecha($_POST['fecha']);
foreach ($lista as $fila){
    echo '<option value="'.$fila['id_viajes_pk'].'">'.$fila['id_autobuses_placa_fk'].' - '. $fila['id_choferes_cedula_fk'].' - '
       .$fila['asientos_disponibles']. '</option>';
}
?>