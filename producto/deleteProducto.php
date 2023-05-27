<?php 

	include ("../config.php");
	session_start();
	$response= array('success' => false, 'mensaje'=>"");

	$barcode=$_POST['barcode'];
	$sql="DELETE FROM producto WHERE pro_barcode=$barcode";
	if($cx->query($sql) === TRUE) {
		$response['success']=true;
		$response['mensaje']="SE ELIMINO EXITOSAMENTE!!";
	}
	else
	{
		$response['success']=false;
		$response['mensaje']="ERROR AL ELIMINAR PRODUCTO";
	}

	echo json_encode($response); 	
 ?>