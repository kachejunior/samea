<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Viajes.php';

$Viajes = new Viajes();
if ($_POST['id'] == ''){
    $Viajes->setAutobus($_POST['autobus']);
    $Viajes->setChofer($_POST['chofer']);
    $Viajes->setFecha($_POST['fecha']);
    $Viajes->guardarNuevo();
}else{
    $Viajes->get($_POST['id']);
    $Viajes->setAutobus($_POST['autobus']);
    $Viajes->setChofer($_POST['chofer']);
    $Viajes->setFecha($_POST['fecha']);
    $Viajes->set();
    $Viajes->calcularAsientosDisponibles();
}
return 1;
?>
