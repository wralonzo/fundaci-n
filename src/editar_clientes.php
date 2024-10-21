<?php

$conexion = mysqli_connect("localhost","root","","programa");

if(isset($_POST['update_stud_data']))
{
    $id = $_POST['id'];

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dpi = $_POST["dpi"];
    $telefono = $_POST['telefono'];
    $n_expediente = $_POST['n_expediente'];
    $direccion = $_POST['direccion'];
    $lugar_n = $_POST['lugar_n'];

    $observacion = $_POST['observacion'];
    $fecha_ad=$_POST['fecha_ad'];
    $tele = $_POST['telefono1'];
    $telefo = $_POST['telefono2'];
    $telefon= $_POST['telefono3'];
    
    $padre = $_POST['padre'];
    $madre=$_POST['madre'];
    $encargado = $_POST['encargado'];

    $query = "UPDATE cliente SET Nombre='$nombre', Apellido='$apellido', Dpi='$dpi',Telefono='$telefono',N_expediente='$n_expediente',Direccion='$direccion',Lugar_n='$lugar_n',Observacion='$observacion',Fecha_ad='$fecha_ad',Telefono1='$tele',Telefono2='$telefo',Telefono3='$telefon',Padre='$padre',Madre='$madre',Encargado='$encargado'  WHERE idcliente='$id' ";
    $query_run = mysqli_query($conexion, $query);

    if($query_run)
    {

        header("Location: clientes.php");
    }
    else
    {

        header("Location: editar.php");
    }
}

?>
