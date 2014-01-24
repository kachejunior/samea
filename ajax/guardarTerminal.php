<?php

require_once '../lib/BaseDatos.php';
require_once '../lib/Terminales.php';

$terminales = new Terminales();
if((isset($_POST['id'])) && ($_POST['id'] == '')){
    $terminales->setDescripcion($_POST['descripcion']);
    $terminales->guardarNuevo();
}else{
    $terminales->get($_POST['id']);
    $terminales->setDescripcion($_POST['descripcion']);
    $terminales->set();
}
return 1;
?>
