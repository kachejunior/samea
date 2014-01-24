<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Boletos.php';

$terminal = new Boletos();
$terminal->get($_POST['id']);
$terminal->remove();

return 1;
?>
