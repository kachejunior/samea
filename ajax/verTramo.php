<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Tramos.php';

$Tramos = new Tramos();
$Tramos->get($_POST['id']);
$Tramos->toJson();
?>