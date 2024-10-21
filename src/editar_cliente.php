<?php

require "../conexion.php";
if(isset($_POST['updatedata'])) {


$id = $_POST['id'];
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Dpi = $_POST['Dpi'];
$Telefono = $_POST['Telefono'];
$N_expediente = $_POST['N_expediente'];
$Direccion = $_POST['Direccion'];
$Lugar_n = $_POST['Lugar_n'];
$Observacion = $_POST['Observacion'];
$Fecha_ad=$_POST['Fecha_ad'];
$Tele = $_POST['Tele'];
$Telefo = $_POST['Telefo'];
$Telefon= $_POST['Telefon'];
$Padre = $_POST['Padre'];
$Madre=$_POST['Madre'];
$Encargado = $_POST['Encargado'];
$sql="UPDATE cliente SET Nombre='$Nombre', Apellido='$Apellido', Dpi='$Dpi', Telefono='$Telefono', N_expediente='$N_expediente', Direccion='$Direccion', Lugar_n='$Lugar_n', Observacion='$Observacion', Fecha_ad='$Fecha_ad', Telefono1='$Tele', Telefono2='$Telefo', Telefono3='$Telefon', Padre='$Padre', Madre='$Madre', Encargado='$Encargado' where idcliente = '$id' ";
$query=mysqli_query($conexion, $sql);

if ($query) {
  header ("location: clientes.php");
}
}
 ?>
