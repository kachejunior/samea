<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Choferes.php';

$chofer = new Choferes();
if ($_POST['cedula_vieja'] == ''){
    $chofer->setCedula($_POST['cedula']);
    $chofer->setNombre($_POST['nombre']);
    $chofer->setApellido($_POST['apellido']);
    $chofer->setFechaNacimiento($_POST['nacimiento']);
    $chofer->setTelefono($_POST['telefono']);
    $chofer->guardarNuevo();
}else{
    $chofer->get($_POST['cedula_vieja']);
    $chofer->setCedula($_POST['cedula']);
    $chofer->setNombre($_POST['nombre']);
    $chofer->setApellido($_POST['apellido']);
    $chofer->setFechaNacimiento($_POST['nacimiento']);
    $chofer->setTelefono($_POST['telefono']);
    $chofer->set($_POST['cedula_vieja']);
}
return 1;
?>
