<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/ViajesTramos.php';

$Viajes = new ViajesTramos();
if ($_POST['tramo_viejo'] == ''){
    $Viajes->setViaje($_POST['viaje']);
    $Viajes->setTramo($_POST['tramo']);
    $Viajes->setHora($_POST['hora']);
    $Viajes->guardarNuevo();
}else{
    $Viajes->get($_POST['viaje'],$_POST['tramo_viejo']);
    $Viajes->setTramo($_POST['tramo']);
    $Viajes->setHora($_POST['hora']);
    $Viajes->set($_POST['tramo_viejo']);
}
return 1;
?>
