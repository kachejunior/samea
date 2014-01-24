<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Autobuses.php';

$autobus = new Autobuses();
if ($_POST['placa_vieja'] == ''){
    $autobus->setPlaca($_POST['placa']);
    $autobus->setMarca($_POST['marca']);
    $autobus->setModelo($_POST['modelo']);
    $autobus->setAsientos($_POST['asientos']);
    $autobus->guardarNuevo();
}else{
    $autobus->get($_POST['placa_vieja']);
    $autobus->setMarca($_POST['marca']);
    $autobus->setModelo($_POST['modelo']);
    $autobus->setAsientos($_POST['asientos']);
    $autobus->set();
}
return 1;
?>
