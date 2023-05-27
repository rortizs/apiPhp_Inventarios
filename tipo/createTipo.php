<?php 

	include ("../config.php");
	session_start();

	$response= array('success' => false, 'mensaje'=>"");

	$tipo=$_POST['tipo'];

	$sql_insertar="INSERT INTO tipo VALUES(null,'$tipo')";
	
		
	if($cx->query($sql_insertar)=== TRUE)
	{
		$response['success']=true;
		$response['mensaje']="SE AGREGO CORRECTAMENTE ";

	}
	else
	{
		$response['success']=false;
		$response['mensaje']="ERROR AL INSERTAR TIPO ";
	}
	echo json_encode($response); 	
 ?>