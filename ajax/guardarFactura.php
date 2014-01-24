<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Facturas.php';

$factura = new Facturas();
if ($_POST['factura'] == ''){
    $factura->setCedula($_POST['cedula']);
    $factura->setANombre($_POST['nombre']);
    $factura->guardarNuevo();
}else{
    $factura->get($_POST['factura']);
    $factura->setCedula($_POST['cedula']);
    $factura->setANombre($_POST['nombre']);
    $factura->set();
}
return 1;
?>
