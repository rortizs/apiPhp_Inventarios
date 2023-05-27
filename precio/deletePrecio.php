<?php 

	include ("../config.php");
	session_start();
	$response= array('success' => false, 'mensaje'=>"");

	$idprecio=$_POST['idprecio'];
	$sql="DELETE FROM precio WHERE id_precio=$idprecio";
	if($cx->query($sql) === TRUE) {
		$response['success']=true;
		$response['mensaje']="SE ELIMINO EXITOSAMENTE!!";
	}
	else
	{
		$response['success']=false;
		$response['mensaje']="ERROR AL ELIMINAR PRECIO";
	}

	echo json_encode($response); 	
 ?>