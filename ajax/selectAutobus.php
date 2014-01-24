<?php
require_once '../lib/BaseDatos.php';
require_once '../lib/Autobuses.php';
$autobuses = new Autobuses();
$lista = $autobuses->getAll();
echo '<option value=""></option>';
foreach ($lista as $fila){
    if(!isset($_POST['id']) || ((int)$_POST['id'] != (int)$fila['id_autobuses_placa_pk']))
        echo '<option value="'.$fila['id_autobuses_placa_pk'].'">'.$fila['id_autobuses_placa_pk']
           . ' - '.$fila['marca'].' - '.$fila['modelo'].' : '.$fila['n_asientos'].'</option>';
}
?>