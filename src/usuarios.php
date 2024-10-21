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
?>
<h3 class="text-center">Usuarios del Sistema</h3>
<div class="card">

    <div class="card-body">

        <form action="registrar.php" method="post" autocomplete="off" id="formulario">

            <div class="row">
                <div class="col-md-3">

            <input type="submit" value="Nuevo Usuario" class="btn btn-primary" id="btnAccion">

        </form>
    </div>
</div>
<div class="table-responsive">
    <table class="table" id="tbl">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DPI</th>
                <th>Telefono</th>
                <th>Fecha N.</th>
                <th>Genero</th>
                <th>Usuario</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="thead-dark">
            <?php
            $query = mysqli_query($conexion, "SELECT * FROM usuario");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $data['idusuario']; ?></td>
                        <td><?php echo $data['nombre']; ?></td>
                        <td><?php echo $data['apellido']; ?></td>
                        <td><?php echo $data['dpi']; ?></td>
                        <td><?php echo $data['telefono']; ?></td>
                        <td><?php echo $data['fecha_nacimiento']; ?></td>
                        <td><?php echo $data['genero']; ?></td>
                        <td><?php echo $data['usuario']; ?></td>
                        <td>
                            <a href="rol.php?id=<?php echo $data['idusuario']; ?>" class="btn btn-warning"><i class='fas fa-key'></i></a>



                            <button type="submit" class="btn btn-success editbtn" data-toggle="modal" data-target="#editar"><i class='fas fa-edit'></i></button>

                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>

</div>
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="editar_usuario.php" method="post">
          <input type="hidden" name="update_id" id="update_id" >

          <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
          </div>


          <div class="form-group">
            <label for="">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
          </div>


          <div class="form-group">
            <label for="">Dpi</label>
            <input type="text" name="dpi" id="dpi" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Fecha Nacimiento</label>
            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Genero</label>
            <input type="text" name="genero" id="genero" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="updatedata"    class="btn btn-primary">Guardar</button>



          </div>
        </form>




</div>
</div>
</div>


<?php include_once "includes/footer.php"; ?>

<script src="script/usuarios.js"></script>
