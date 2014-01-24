<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Choferes.php';
$choferes = new Choferes();
$lista = $choferes->getAll();
echo '<option value=""></option>';
foreach ($lista as $fila){
    if(!isset($_POST['id']) || ((int)$_POST['id'] != (int)$fila['id_choferes_cedula_pk']))
        echo '<option value="'.$fila['id_choferes_cedula_pk'].'">'.$fila['id_choferes_cedula_pk']
            .' - '.$fila['apellido'].' '.$fila['nombre'].'</option>';
}
?>