<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/ViajesTramos.php';

$Viajes = new ViajesTramos();
$Viajes->get($_POST['viaje'],$_POST['tramo']);
$Viajes->remove();
return 1;
?>
