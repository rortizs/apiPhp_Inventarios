<?php 
	include ("config.php");
	session_start();

	$barcode=$_POST['barcode'];
	$name=$_POST["name"];
	$type=$_POST['valtype'];

	$sql="SELECT * FROM product WHERE barcode='$barcode'";
	$r=$cx->query($sql);

	$count=$r->num_rows;

	if($count>0)
	{
		echo "found";
	}
	else
	{
		$sql2="INSERT INTO product VALUES('$barcode','$name','$type')";
		$cx-query($sql2);
	}

 ?>