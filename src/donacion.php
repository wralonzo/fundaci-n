<?php
session_start();
include "../conexion.php";
$id_user = $_SESSION['idUser'];
$permiso = "dona";
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}
include "includes/header.php";
?>

<div class="card">
    <div class="card-body">

        <form action="registrardonar.php" method="post" autocomplete="off" id="formulario">


            <div class="row">
                <div class="col-md-3">

            <input type="submit" value="Nuevo" class="btn btn-primary" id="btnAccion">

        </form>
    </div>
</div>
<div class="table-responsive">
    <table class="table" id="tbl">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Herramienta</th>

            </tr>
        </thead>
        <tbody class="thead-dark">
            <?php
            $query = mysqli_query($conexion, "SELECT * FROM dona");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['tituto']; ?></td>
                        <td><?php echo $data['fecha']; ?></td>
                        <td><?php echo $data['descripcion']; ?></td>
                        <td><img src="data:image/jpg;base64,<?php echo base64_encode($data['imagen'] )?>" height="60" width="75" class="img-thumbnail" />
                         <td>
                            <button type="submit" class="btn btn-success editbtn" data-toggle="modal" data-target="#editar"><i class='fas fa-edit'></i></button>
                            <form action="eliminar_donar.php?id=<?php echo $data['id']; ?>" method="post" class="confirmar d-inline">
                                <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
                            </form>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


          <form action="editar_donar.php" method="post" class="row g-3">
            <input type="hidden" name="update_id" id="update_id" >
            <div class="col-auto">
              <label for="staticEmail2" class="visually-hidden">Titulo</label>
              <input type="text" name="titulo" id="titulo" class="form-control">
            </div>
            <div class="col-auto">
              <label for="inputPassword2" class="visually-hidden">Fecha</label>
              <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <div class="col-auto">
              <label for="inputPassword2" class="visually-hidden">Descripcion</label>
              <textarea type="text" rows="5" name="descripcion" id="descripcion" class="form-control" ></textarea>
            </div>
            <div class="col-auto">
              <label for="inputPassword2" class="visually-hidden">Foto</label>
               <input type="file" class="form-control" name="imagen" id="imagen"  disabled>
            </div>

            <div class="modal-footer">
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata"    class="btn btn-success">Guardar</button>
          </form>

  </div>
  </div>
  </div>
  </div>
  </div>

<?php include_once "includes/footer.php"; ?>

<script src="script/donar.js"></script>
