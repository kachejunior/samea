<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Viajes.php';
require_once '../lib/Boletos.php';

$tm = split(':', $_POST['viajes']);

$boleto = new Boletos();
if ($_POST['boleto'] == ''){
    $boleto->setFactura($_POST['factura']);
    $boleto->setCedula($_POST['cedula']);
    $boleto->setTramo($tm[1]);
    $boleto->setViaje($tm[0]);
    $boleto->guardarNuevo();
}else{
    $boleto->get($_POST['boleto']);
    $viajeAntiguo = new Viajes();
    $viajeAntiguo->get($boleto->getViaje());
    $boleto->setFactura($_POST['factura']);
    $boleto->setCedula($_POST['cedula']);
    $boleto->setTramo($tm[1]);
    $boleto->setViaje($tm[0]);
    $boleto->set($_POST['boleto']);
    $viajeAntiguo->calcularAsientosDisponibles();
}
return 1;
?>
