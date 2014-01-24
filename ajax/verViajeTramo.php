<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/ViajesTramos.php';

$viajes = new ViajesTramos();
$viajes->get($_POST['viaje'], $_POST['tramo']);
$viajes->toJson();

?>