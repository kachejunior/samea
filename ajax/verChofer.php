<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Choferes.php';

$chofer = new Choferes();
$chofer->get($_POST['cedula']);
$chofer->toJson();
?>