<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Terminales.php';

$terminal = new Terminales();
$terminal->get($_POST['id']);
$terminal->remove();

return 1;
?>
