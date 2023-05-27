<?php 

	include ("config.php");
	session_start();

	$user=$_POST['user'];
	$password=md5($_POST["password"]);
	$nombre=$_POST['nombre'];
	$cedula=$_POST['cedula'];
	$sql_ver="SELECT * FROM usuario WHERE usuario='$user'";
	$r=$cx->query($sql_ver);
	$count=$r->num_rows;
	if($count>0)
	{
		echo "CORREO NO DISPONIBLE";
	}
	else
	{
		$sql_insertar="INSERT INTO usuario VALUES('$user','$password','$nombre','$cedula')";
		$cx->query($sql_insertar);
		echo "Ok";
	}

 ?>