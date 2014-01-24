<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Boletos.php';

$boleto = new Boletos();
$boleto->get($_POST['boleto']);
$boleto->toJson();
?>