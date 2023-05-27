<?php 

	include ("../config.php");

	$sql = "SELECT * FROM precio";
	$result = $cx->query($sql);
	$response="";
	if($result->num_rows > 0) 
	{  
        $contador=0;
        $str1="ui-li-has-alt";
        $str2="ui-first-child";
        $str3="ui-last-child";
		while($row = $result->fetch_array()) 
		 {
		 	$idprecio = $row[0];
		 	$pcompra=$row[1];
		 	$pventa=$row[2];
		 	$impuesto=$row[3];
            if($contador==0){
                $response.="<li class='$str1 $str2'>";
            }else if($contador<($result->num_rows-1)){
                $response.="<li class='$str1'>";
            }else if($contador==($result->num_rows-1)){
                $response.="<li class='$str1 $str3'>";   
            }
		 	$response.="
                    <a 
                    href='#ver_precio' 
                    onclick='readPrecio($idprecio)'
                    data-rel='popup' 
                    data-position-to='window'>
                        <h1> Compra: [$ $pcompra ] - Venta: [$ $pventa]</h1>
                        <h2> Impuesto: $ $impuesto </h2>
                    </a>
                    <a 
                    href='#eliminar_precio' 
                    data-rel='popup' 
                    data-position-to='window' 
                    data-transition='pop'
                    onclick='asignarPrecio($idprecio)'>
                    Eliminar
                    </a>
                </li>";
                $contador++;
		 }
         $response.="</ul>";
	}

	echo $response; 	
 ?>