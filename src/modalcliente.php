<?php


include "../conexion.php";

if(isset($_POST['savedata']))
{

  $fecha_ad=$_POST['fecha_ad'];
  $n_expediente = $_POST['n_expediente'];

  $query = "INSERT INTO cliente('Fecha_ad','N_expediente')values('$fecha_ad','$n_expediente')";
  $query_run = mysqli_query($conexion,$query);
  if ($query_run) {
    echo '<script>alert("Guardado");</script>';
    header('location: registrarcliente.php');
  }
  else {
    echo '<script> alert("No se Guardo");</script>';
  }

}








 ?>
