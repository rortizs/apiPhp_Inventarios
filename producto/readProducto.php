<?php 

	include ("../config.php");
	session_start();
	$response= array('success' => false, 'barcode'=>"", 'nombre' => "", 'tipo'=>"",'descripcion'=>"");

	$barcode=$_POST['barcode'];
	$sql="SELECT * FROM producto WHERE pro_barcode='$barcode'";

	$r=$cx->query($sql);
	$row=$r->fetch_array();

	$response['success']=true;
	$response['barcode']=$row['pro_barcode'];
	$response['nombre']=$row['pro_nombre'];
	$response['tipo']=$row['pro_id_tipo'];
	$response['precio']=$row['pro_id_precio'];
	$response['descripcion']=$row['pro_descripcion'];

	echo json_encode($response); 	
 ?>