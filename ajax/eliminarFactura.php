<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Facturas.php';


$factura = new Facturas();
$factura->get($_POST['factura']);
$factura->remove();

return 1;
?>
