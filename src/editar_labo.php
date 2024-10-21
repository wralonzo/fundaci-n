<?php

session_start();

require("../conexion.php");

if(isset($_POST['updatedata'])) {


  $id = $_POST['update_id'];
  $Nombre = $_POST['nombre'];
  $Apellido = $_POST['apellido'];
  $Dpi = $_POST['dpi'];
  $Telefono = $_POST['telefono'];
  $Fecha = $_POST['fecha_nacimiento'];



  $sql="UPDATE usuario SET nombre='$Nombre', apellido='$Apellido', dpi='$Dpi', telefono='$Telefono', fecha_nacimiento='$Fecha' where idusuario = '$id' ";
$query_run = mysqli_query($conexion, $sql);


  if($query_run)
   {
     $to = "Actualizado";
  echo '<script type="text/javascript">alert("Data has been submitted to ' . $to . '");</script>';
    header("location: laboratorio.php");
  }
else
{
  echo '<script> alert("Data Not Updated"); </script>';
}


}



 ?>
