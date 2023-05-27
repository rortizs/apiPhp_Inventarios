<?php 

	include ("config.php");
	session_start();
	$response= array('success' => false, 'usuario'=>"", 'nombre' => "", 'password'=>"",'id'=>"");

	$user=$_POST['usuario'];
	$sql="SELECT * FROM usuario WHERE usuario='$user'";

	$r=$cx->query($sql);
	$row=$r->fetch_array();
	$response['success']=true;
	$response['usuario']=$row['usuario'];
	$response['password']=$row['password'];
	$response['nombre']=$row['nombre'];
	$response['id']=$row['id'];

	echo json_encode($response); 	
 ?>