<?php


include "../conexion.php";
$tituto = $_POST['tituto'];
$fecha = $_POST['fecha'];
$foto = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$descripcion = $_POST['descripcion'];

  $query_insert = mysqli_query($conexion, "INSERT INTO dona(tituto,fecha,descripcion,imagen) values ('$tituto','$fecha','$descripcion','$foto')");
  if ($query_insert) {
    echo "Guardado";
  }else {
    echo "no se guardo";
  }



 ?>
