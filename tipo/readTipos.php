<?php 

	include ("../config.php");
	$sql = "SELECT * FROM tipo";
	$result = $cx->query($sql);
	$response="<option>--Tipo--</option>";
	if($result->num_rows > 0) 
	{ 
		 while($row = $result->fetch_array()) 
		 {
		 	$id = $row[0];
		 	$tipo=$row[1];
		 	$response.="<option value='$id'>$tipo</option>";
		 }
	}

	echo $response; 	
 ?>