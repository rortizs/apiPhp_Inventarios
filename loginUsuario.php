<?php 

	include ("config.php");
	session_start();
	$response= array('success' => false, 'mensaje' => "");

	$user=$_POST['user'];
	$password=md5($_POST["password"]);
	$sql="SELECT * FROM usuario WHERE usuario='$user' AND password='$password'";

	$r=$cx->query($sql);
	$count=$r->num_rows;

	$row=$r->fetch_array();
	
	if($count>0)
	{
		$response['success']=true;
		$response['mensaje']=$row['nombre'];

	}
	else
	{
		$response['success']=false;
		$response['mensaje']="CORREO Y/O CONTRASEÑA INCORRECTA";
	}
echo json_encode($response); 	
 ?>