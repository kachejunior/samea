<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Pasajeros.php';

$pasajero = new Pasajeros();
if ($_POST['cedula_vieja'] == ''){
    $pasajero->setCedula($_POST['cedula']);
    $pasajero->setNombre($_POST['nombre']);
    $pasajero->setApellido($_POST['apellido']);
    $pasajero->setFechaNacimiento($_POST['nacimiento']);
    $pasajero->setTelefono($_POST['telefono']);
    $pasajero->guardarNuevo();
}else{
    $pasajero->get($_POST['cedula_vieja']);
    $pasajero->setNombre($_POST['nombre']);
    $pasajero->setCedula($_POST['cedula']);
    $pasajero->setApellido($_POST['apellido']);
    $pasajero->setFechaNacimiento($_POST['nacimiento']);
    $pasajero->setTelefono($_POST['telefono']);
    $pasajero->set($_POST['cedula_vieja']);
}
return 1;
?>
