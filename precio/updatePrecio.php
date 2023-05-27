<?php 

	include ("../config.php");
	session_start();
	$response= array('success' => false, 'mensaje'=>"");

	$idprecio=$_POST['idprecio'];
	$pcompra=$_POST['pcompra'];
	$pventa=$_POST['pventa'];
	$impuesto=$_POST['impuesto'];

	$sql="UPDATE precio
			 SET 			 
			 precio_compra='$pcompra',
			 precio_venta='$pventa',
			 impuesto='$impuesto'
			 WHERE id_precio=$idprecio";
	
	if($cx->query($sql)=== TRUE)
	{	
		$response['success']=true;
		$response['mensaje']="SE ACTUALIZO CORRECTAMENTE ";	
	}
	else
	{
		$response['success']=false;
		$response['mensaje']="ERROR AL ACTUALIZAR PRECIO";
	}
	echo json_encode($response); 	
 ?> 