<?php 

	include ("../config.php");

	$sql = "SELECT * FROM producto INNER JOIN tipo ON producto.pro_id_tipo=tipo.id_tipo INNER JOIN precio ON producto.pro_id_precio=precio.id_precio";
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
		 	$barcode = $row[0];
		 	$nombre=$row[1];
		 	$tipo=$row[2];
		 	$des=$row[3];
            $nombre_tipo=$row[6];
            $precio_compra=$row[8];
            $precio_venta=$row[9];
            $impuesto=$row[10];
            if($contador==0){
                $response.="<li class='$str1 $str2'>";
            }else if($contador<($result->num_rows-1)){
                $response.="<li class='$str1'>";
            }else if($contador==($result->num_rows-1)){
                $response.="<li class='$str1 $str3'>";   
            }
		 	$response.="
                    <a 
                    href='#ver_producto' 
                    onclick='readProducto($barcode)'
                    data-rel='popup' 
                    data-position-to='window'>
                        <p>
                        Código de barras: <b>[ $barcode ]</b><br>
                        Tipo: <b>$nombre_tipo </b><br>
                        Nombre Producto:<b>$nombre </b><br>
                        Precio Compra: <b>$ $precio_compra</b><br>
                        Precio Venta: <b>$ $precio_venta</b><br>
                        Impuesto: <b>$ $impuesto</b><br>
                        Descripción:<p>$des</p>
                        </p>
                         

                    </a>
                    <a 
                    href='#eliminar_producto' 
                    data-rel='popup' 
                    data-position-to='window' 
                    data-transition='pop'
                    onclick='asignarCodeProducto($barcode)'>
                    Eliminar
                    </a>
                </li>";
                $contador++;
		 }
         $response.="</ul>";
	}

	echo $response; 	
 ?>