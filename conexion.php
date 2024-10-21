<?php

    $host = "sql305.epizy.com";
    $user = "epiz_32766045";
    $clave = "WYJpDfEFpi";
    $bd = "epiz_32766045_far";

	
	
	
    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");


?>
