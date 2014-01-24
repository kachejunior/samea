<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Pasajeros.php';

$pasajero = new Pasajeros();
$pasajero->get($_POST['cedula']);
$pasajero->toJson();
?>