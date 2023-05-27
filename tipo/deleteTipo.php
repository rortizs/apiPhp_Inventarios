<?php 

	include ("../config.php");
	session_start();
	$response= array('success' => false, 'mensaje'=>"");

	$idtipo=$_POST['idtipo'];

	$sql="DELETE FROM tipo WHERE id_tipo=$idtipo";

	if($cx->query($sql) === TRUE) {
		$response['success']=true;
		$response['mensaje']="SE ELIMINO EXITOSAMENTE!!";
	}
	else
	{
		$response['success']=false;
		$response['mensaje']="ERROR AL ELIMINAR TIPO";
	}

	echo json_encode($response); 	
 ?>