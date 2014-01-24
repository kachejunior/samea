<?php 
	include '../lib/Facturas.php';
	include '../lib/BaseDatos.php';
	
	$factura=new Facturas();
	$factura->setANombre($_POST['nombre']);
	$factura->setCedula($_POST['cedula']);
	$idFactura = $factura->guardarNuevo();
	header('Location:pasajeroBoleteria2.php?factura='.$idFactura.'&tramo='.$_POST['tramo'].'&viaje='.$_POST['viaje']);

