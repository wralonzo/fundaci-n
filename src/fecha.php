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
<h3 class="text-center">Historial Reingreso Pacientes</h3>
<div class="card">
    <div class="card-body">

        <!--<form action="registrarclien.php" method="post" autocomplete="off" id="formulario">

            --<div class="row">
                <div class="col-md-3">
                  <input type="submit" value="Nuevo" class="btn btn-primary" id="btnAccion">
                </div>
            </div>
                  </form>-->

                  <div class="panel-body" style="height: 400px;" id="formularioregistros">
            <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered mt-2" id="tbl">
                <thead class="thead-dark">
                    <tr>
                      
                <th>Numero de Expediente</th>
                <th>Fecha de Reingreso</th>
                
                <th></th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM fechaad");
                    $result = mysqli_num_rows($query);
                    if ($result > 0) {
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <tr>

                                <td ><?php echo $data['idN_expediente']; ?></td>
                                <td ><?php echo $data['Fecha_ad']; ?></td>
                               
                                <td>

                                    </form>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
</div>


  </div>

<?php include_once "includes/footer.php"; ?>
