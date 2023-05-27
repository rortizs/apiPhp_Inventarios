<?php 

	include ("../config.php");
	session_start();
	$response= array('success' => false, 'mensaje'=>"");

	$codigo=$_POST['codigo'];
	$barcode_actual=$_POST['barcode_actual'];
	$nombre=$_POST['nombre'];
	$tipo=$_POST['tipo'];
	$des=$_POST['des'];
	$precio=$_POST['precio'];

	
	if($codigo!=$barcode_actual)
	{	
		$sql_ver="SELECT * FROM producto WHERE pro_barcode=$codigo";
		$r=$cx->query($sql_ver);
		$count=$r->num_rows;
		if($count>0)
		{
			$response['success']=false;
			$response['mensaje']="CÓDIGO DE BARRAS YA REGISTRADO ".$codigo."+".$barcode_actual;
		}
		else
		{
			$sql="UPDATE producto
			 SET 
			 pro_barcode=$codigo,
			 pro_nombre = '$nombre',
			 pro_id_tipo=$tipo,
			 pro_descripcion='$des',
			 pro_id_precio=$precio
			 WHERE pro_barcode= $barcode_actual";
			$cx->query($sql);
			$response['success']=true;
			$response['mensaje']="SE ACTUALIZO CORRECTAMENTE ";
			//echo "No Son Iguales".$sql;
		}
		
	}
	else
	{
		$sql="UPDATE producto
			 SET 			 
			 pro_nombre = '$nombre',
			 pro_id_tipo=$tipo,
			 pro_descripcion='$des',
			 pro_id_precio=$precio
			 WHERE pro_barcode=$barcode_actual";
			 //echo "Son Iguales".$sql;
		$cx->query($sql);
		$response['success']=true;
		$response['mensaje']="SE ACTUALIZO CORRECTAMENTE ";
	}
	echo json_encode($response); 	
 ?> 