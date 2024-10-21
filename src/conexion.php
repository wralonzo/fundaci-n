<?php
    function conectar(){
  $conn=null;
    $host = "localhost";
    $bd = "farmaciasistema2";
    $user = "root";
    $clave = "";
    
    
    try{
        $conn = new PDO ('mysql:host='.$host.'dbname='.$bd,$user,$clave);

    }catch(PDOException $e){

        echo ':Error al conectar'.$e;
        exit;

    }

    return $conn;

    }

?>
