<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Terminales.php';

$terminales = new Terminales();
$terminales->get($_POST['id']);
$terminales->toJson();
?>