<?php

session_start();

require("../conexion.php");

if(isset($_POST['updatedata'])) {


  $id = $_POST['update_id'];
  $titulo = $_POST['titulo'];
  $fecha = $_POST['fecha'];
  $descripcion = $_POST['descripcion'];
  $imagen = $_POST['imagen'];




  $sql="UPDATE dona SET tituto='$titulo', fecha='$fecha', descripcion='$descripcion' where id = '$id' ";
$query_run = mysqli_query($conexion, $sql);


  if($query_run)
   {
     $to = "Actualizado";
  echo '<script type="text/javascript">alert("Data has been submitted to ' . $to . '");</script>';
    header("location: donacion.php");
  }
else
{
  echo '<script> alert("Data Not Updated"); </script>';
}


}



 ?>
