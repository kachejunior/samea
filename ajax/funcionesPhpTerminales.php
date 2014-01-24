<?php 
require_once '../lib/BaseDatos.php';
require_once '../lib/Terminales.php';

function verTerminal($id){
	$terminal= new Terminales();
	$terminal->get($id);
	return $terminal->getDescripcion();
	}
?>