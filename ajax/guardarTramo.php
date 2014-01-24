<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Tramos.php';

$Tramos = new Tramos();
if ($_POST['id'] == ''){
    $Tramos->setOrigen($_POST['origen']);
    $Tramos->setDestino($_POST['destino']);
    $Tramos->setPrecio($_POST['precio']);
    $Tramos->setTiempo($_POST['tiempo']);
    $Tramos->guardarNuevo();
}else{
    $Tramos->get($_POST['id']);
    $Tramos->setOrigen($_POST['origen']);
    $Tramos->setDestino($_POST['destino']);
    $Tramos->setPrecio($_POST['precio']);
    $Tramos->setTiempo($_POST['tiempo']);
    $Tramos->set();
}
return 1;
?>
