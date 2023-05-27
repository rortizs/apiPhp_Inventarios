<?php 

	include ("../config.php");
	$sql = "SELECT * FROM precio";
	$result = $cx->query($sql);
	$response="<option>--Precio--</option>";
	if($result->num_rows > 0) 
	{ 
		 while($row = $result->fetch_array()) 
		 {
		 	$id = $row[0];
		 	$precio_compra=$row[1];
		 	$precio_venta=$row[2];
		 	$response.="<option value='$id'>$precio_compra - $precio_venta</option>";
		 }
	}

	echo $response; 	
 ?>