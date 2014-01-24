<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Tramos.php';

$tramo = new Tramos();
$tramo->get($_POST['id']);
$tramo->remove();
return 1;
?>
