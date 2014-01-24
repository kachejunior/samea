<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Terminales.php';
$terminales = new Terminales();
$lista = $terminales->getAll();
echo '<option value=""></option>';
foreach ($lista as $fila){
    if(!isset($_POST['id']) || ((int)$_POST['id'] != (int)$fila['id_terminales_pk']))
        echo '<option value="'.$fila['id_terminales_pk'].'">'.$fila['descripcion'].'</option>';
}
?>