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
include "includes/header.php";
include '../conexion.php';
$id = $_GET['id'];
$query = mysqli_query($conexion, "SELECT * from fechaad p INNER JOIN cliente u
  ON
  p.Nombre = u.idcliente
  WHERE
  id= $id");
while ($data = mysqli_fetch_assoc($query)) { ?>


  <div class="card">
      <div class="card-body">

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Editar</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                        <form action="editar_fecha.php" method="POST" autocomplete="off" id="formulario">
                          <div class="row">


                                <input type="hidden" name="id" class="form-control" value="<?php echo $data['id']; ?>" >
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Cliente">Cliente</label>
                                        <input type="text" class="form-control"  name="Nombre"  value="<?php echo $data['Nombre'].' '. $data['Apellido']; ?>" disabled>
                                    </div>
                                </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Fecha_ad">Fecha Ad</label>
                                    <input type="text" class="form-control"  name="Fecha_ad"  value="<?php echo $data['Fecha_ad']; ?>">
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="n_expediente">No. Expediente</label>
                                    <input type="text" class="form-control"  name="n_expediente" value="<?php echo $data['N_expediente'] ?>">



                            <div class="form-group mb-3">
                                <button type="submit" name="update_stud_data" class="btn btn-primary">Guardar</button>
                                    <a href="fecha.php" class="btn btn-danger">Regresar</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

  <?php } ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


<?php include_once "includes/footer.php"; ?>
