<?php
session_start();
$permiso = 'usuarios';
$id_user = $_SESSION['idUser'];
include "../conexion.php";
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}

if (!empty($_POST)) {
    
    $Expediente = $_POST['Expediente'];
    $idNombre = $_POST['nombre'];
    $Fecha  = $_POST['Fecha'];

    $alert = "";
    if (empty($Fecha)) {
        $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Todo los campos son obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    } else {
  $query_insert = mysqli_query($conexion, "INSERT INTO fechaad(idNombre,idN_expediente,Fecha_ad) values ('$idNombre','$Expediente','$Fecha')");
                    if ($query_insert) {
                        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usuario Registrado
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    } else {
                        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error al registrar
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                    }
                }
            }

?>
<?php


include "includes/header.php";
include '../conexion.php';
$id = $_GET['idcliente'];
$query = mysqli_query($conexion, "SELECT idcliente,Nombre,N_expediente from cliente WHERE idcliente = $id ");

while ($data = mysqli_fetch_assoc($query)) { ?>


  <div class="card">
      <div class="card-body">

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Fecha Reingreso</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                        <form action="" method="POST" autocomplete="off" id="formulario">
                              <?php echo isset($alert) ? $alert : ''; ?>
                          <input type="hidden" id="id" name="id">

                                                    <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                       
                                        <label for="N_expediente">No. Expediente</label>
                                        <input type="text" class="form-control"  name="Expediente" id="Expediente" value="<?php echo $data['N_expediente']; ?>">

                                    </div>
                                </div>

                      
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Nombre">Nombre</label>
                                        <input type="text" class="form-control"  name="nombre" id="nombre"  value="<?php echo $data['Nombre']; ?>">
                                    </div>
                                </div>

                              <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="Fecha">Fecha Reingreso</label>
                                    <input type="date" class="form-control"  name="Fecha" id="Fecha" required>
                                  </div>
                              </div>

                            <div class="form-group mb-3">
                            </br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="clientes.php" class="btn btn-danger">inicio</a>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>


                  <div class="panel-body" style="height: 400px;" id="formularioregistros">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered mt-2" id="tbl">
                <thead class="thead-dark">
                    <tr>
                    
               <th></th>
                <th>Fecha de Reingreso</th>
                <th>No de Expediente</th>
                <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                
              $query = mysqli_query($conexion, "SELECT * FROM fechaad ");



                    $result = mysqli_num_rows($query);
                    if ($result > 0) {
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <tr>

                                 <td ><?//php echo $data['id']; ?></td>
                                <td ><?php echo $data['Fecha_ad']; ?></td>
                                 <td ><?php echo $data['idN_expediente']; ?></td>
                               
                                    <td>
                          
                            <!--<form action="eliminar_cliente.php?id=<//?php echo $data['idcliente']; ?>" method="post" class="confirmar d-inline">
                                <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>

                            </form>-->

                    
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

  </div>



  <?php } ?>

<?php include_once "includes/footer.php"; ?>
