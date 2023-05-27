<?php 

	include ("../config.php");
	session_start();

	$response= array('success' => false, 'mensaje'=>"");

	$codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	$tipo=$_POST['tipo'];
	$des=$_POST['des'];
	$precio=$_POST['precio'];

	$sql_ver="SELECT * FROM producto WHERE pro_barcode='$codigo'";
	$r=$cx->query($sql_ver);
	$count=$r->num_rows;
	if($count>0)
	{
		$response['success']=false;
		$response['mensaje']="CÓDIGO DE BARRAS YA REGISTRADO ";
	}
	else
	{
		$sql_insertar="INSERT INTO producto VALUES($codigo,'$nombre',$tipo,'$des',$precio)";
		$cx->query($sql_insertar);
		$response['success']=true;
		$response['mensaje']="SE AGREGO CORRECTAMENTE ";
	}
	echo json_encode($response); 	
 ?>