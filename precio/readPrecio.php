<?php 

	include ("../config.php");
	session_start();
	$response= array('success' => false, 'idprecio'=>"", 'pcompra' => "", 'pventa'=>"",'impuesto'=>"");

	$idprecio=$_POST['idprecio'];
	$sql="SELECT * FROM precio WHERE id_precio=$idprecio";

	$r=$cx->query($sql);
	$row=$r->fetch_array();

	$response['success']=true;
	$response['idprecio']=$row['id_precio'];
	$response['pcompra']=$row['precio_compra'];
	$response['pventa']=$row['precio_venta'];
	$response['impuesto']=$row['impuesto'];

	echo json_encode($response); 	
 ?>