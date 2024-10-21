<?php
session_start();
$permiso = 'usuarios';
$id_user = $_SESSION['idUser'];
include "../conexion.php";
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d 
ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}
include "includes/header.php";
?>
<div class="card-header card-header-primary card-header-icon">
                          
<div class="btn-group ">
  

  </div>

<h2 class="text-center">Reportes</h2></br>

<div class="col-lg-5 col-md-6 col-sm-6">
        <div class="card card-stats">
           <div class="card-header card-header-danger card-header-icon">
                 <div class="card-icon">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <a href="reportecliente2.php" class="card-category text-success font-weight-bold">
                   <h3>Pacientes Ministerio de Salud</h3>
                </a>
              
            </div>
            <div class="card-footer bg-secondary text-white">
            </div>
        </div>
    </div>
  

<div class="col-lg-5 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <a href="reportecliente.php" class="card-category text-success font-weight-bold">
                   <h3>Pacientes Fundabiem</h3>
                </a>
              
            </div>
            <div class="card-footer bg-secondary text-white">
            </div>
        </div>
    </div>
  





<?php include_once "includes/footer.php"; ?>
