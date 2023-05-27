<?php 

	include ("../config.php");

	$sql = "SELECT * FROM tipo";
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
		 	$idtipo = $row[0];
		 	$nombre=$row[1];
            if($contador==0){
                $response.="<li class='$str1 $str2'>";
            }else if($contador<($result->num_rows-1)){
                $response.="<li class='$str1'>";
            }else if($contador==($result->num_rows-1)){
                $response.="<li class='$str1 $str3'>";   
            }
		 	$response.="
                    <a 
                    href='#ver_tipo' 
                    onclick='readTipo($idtipo)'
                    data-rel='popup' 
                    data-position-to='window'>
                        <h1> [ $nombre ]</h1>
                    </a>
                    <a 
                    href='#eliminar_tipo' 
                    data-rel='popup' 
                    data-position-to='window' 
                    data-transition='pop'
                    onclick='asignarTipo($idtipo)'>
                    Eliminar
                    </a>
                </li>";
                $contador++;
		 }
         $response.="</ul>";
	}

	echo $response; 	
 ?>