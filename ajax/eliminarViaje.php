<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Viajes.php';

$Viajes = new Viajes();
$Viajes->get($_POST['id']);
$Viajes->remove();
return 1;
?>
