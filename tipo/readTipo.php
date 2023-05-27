<?php 

	include ("../config.php");
	session_start();
	$response= array('success' => false, 'idtipo'=>"", 'tipo'=>"");

	$idtipo=$_POST['idtipo'];

	$sql="SELECT * FROM tipo WHERE id_tipo=$idtipo";
	
	$r=$cx->query($sql);
	$row=$r->fetch_array();

	$response['success']=true;
	$response['idtipo']=$row['id_tipo'];
	$response['tipo']=$row['tipo'];

	echo json_encode($response); 	
 ?>