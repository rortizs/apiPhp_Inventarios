<?php 

	include ("../config.php");
	session_start();
	$response= array('success' => false, 'mensaje'=>"");

	$idtipo=$_POST['idtipo'];
	$tipo=$_POST['tipo'];

	$sql="UPDATE tipo
			 SET 			 
			 tipo='$tipo'
			 WHERE id_tipo=$idtipo";
	
	if($cx->query($sql)=== TRUE)
	{	
		$response['success']=true;
		$response['mensaje']="SE ACTUALIZO CORRECTAMENTE ";	
	}
	else
	{
		$response['success']=false;
		$response['mensaje']="ERROR AL ACTUALIZAR TIPO";
	}
	echo json_encode($response); 	
 ?> 