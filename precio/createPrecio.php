<?php 

	include ("../config.php");
	session_start();

	$response= array('success' => false, 'mensaje'=>"");

	$pcompra=$_POST['pcompra'];
	$pventa=$_POST['pventa'];
	$impuesto=$_POST['impuesto'];

	$sql_insertar="INSERT INTO precio VALUES(null,'$pcompra','$pventa','$impuesto')";
	
		
	if($cx->query($sql_insertar)=== TRUE)
	{
		$response['success']=true;
		$response['mensaje']="SE AGREGO CORRECTAMENTE ";

	}
	else
	{
		$response['success']=false;
		$response['mensaje']="ERROR AL INSERTAR PRECIO ";
	}
	echo json_encode($response); 	
 ?>