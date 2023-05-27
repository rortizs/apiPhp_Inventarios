<?php 

	include ("config.php");
	session_start();
	$response= array('success' => false, 'mensaje'=>"", 'usuario'=>"", 'nombre' => "", 'password'=>"",'id'=>"");

	$user=$_POST['usuario'];
	$nombre=$_POST['nombre'];
	$id=$_POST['id'];
	$pass_anterior=$_POST['pass_anterior'];
	$pass1=$_POST['pass1'];
	$p=$cx->query("SELECT * FROM usuario WHERE usuario='$user'");
	$pr=$p->fetch_array();
	if($pr['password']!=md5($pass_anterior)){
		$response['success']=false;
		$response['mensaje']="CONTRASEÑA ACTUAL NO COINCIDE";
	}
	else
	{
		if($pass1=="")
		{
			$sql="UPDATE usuario
			 SET 
			 nombre = '$nombre',
			 id='$id'
			 WHERE usuario= '$user'";
		}
		else
		{
			$pass1=md5($pass1);
			$sql="UPDATE usuario
			 SET 
			 nombre = '$nombre',
			 id='$id',
			 password='$pass1'
			 WHERE usuario= '$user'";
		}
		
		$r=$cx->query($sql);
		$pq=$cx->query("SELECT * FROM usuario WHERE usuario='$user'");
		$row=$pq->fetch_array();
		$response['success']=true;
		$response['mensaje']="SE ACTUALIZO CORRECTAMENTE";
		$response['usuario']=$row['usuario'];
		$response['password']=$row['password'];
		$response['nombre']=$row['nombre'];
		$response['id']=$row['id'];
	}
	echo json_encode($response); 	
 ?> 