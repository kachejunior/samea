<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Autobuses.php';

$autobus = new Autobuses();
$autobus->get($_POST['placa']);
$autobus->toJson();
?>