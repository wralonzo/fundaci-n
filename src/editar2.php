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
$query = mysqli_query($conexion, "SELECT * FROM fechaad WHERE id = $id");
while ($data = mysqli_fetch_assoc($query)) { ?>

  <div class="card">
      <div class="card-body">

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Informacion</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                        <form action="editar_clientes.php" method="POST"  autocomplete="off" id="formulario">
                          <div class="row">
                            <div class="col-md-3">
                            <div class="form-group">
                                <label for="">ID</label>
                                <input type="text" name="id" class="form-control" value="<?php echo $data['id']; ?>" disabled>
                            </div>
                          </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Nombre">FECHA</label>
                                    <input type="text" class="form-control"  name="nombre"  value="<?php echo $data['Fecha_ad']; ?>" disabled>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Apellido">Apellido</label>
                                    <input type="text" class="form-control"  name="apellido" value="<?php echo $data['Apellido'] ?>"disabled>

                                </div>
                              </div>
                                <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Dpi</label>
                                <input type="text" name="dpi" class="form-control" value="<?php echo $data['Dpi']; ?>" disabled>
                            </div>
                          </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Telefono">Telefono</label>
                                    <input type="text" class="form-control"  name="telefono"  value="<?php echo $data['Telefono1']; ?>"disabled>
                                </div>
                            </div>




                              <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" class="form-control" value="<?php echo $data['Direccion']; ?>" disabled>
                            </div>
                          </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Lugar">Lugar</label>
                                    <input type="text" class="form-control"  name="lugar_n" value="<?php echo $data['Lugar_n'] ?>"disabled>

                                </div>
                              </div>
                              <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Observacion</label>
                                <input type="text" name="observacion" class="form-control" value="<?php echo $data['Observacion']; ?>" disabled>
                            </div>
                          </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Telefono1">Telefono 1</label>
                                    <input type="text" class="form-control"  name="telefono1" value="<?php echo $data['Telefono1'] ?>"disabled>

                                </div>
                              </div>
                                <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Telefono 2</label>
                                <input type="text" name="telefono2" class="form-control" value="<?php echo $data['Telefono2']; ?>"disabled >
                            </div>
                          </div>

                          <div class="col-md-3">
                      <div class="form-group">
                          <label for="">Telefono 3</label>
                          <input type="text" name="telefono3" class="form-control" value="<?php echo $data['Telefono3']; ?>" disabled>
                      </div>
                    </div>


                        </div>
                        <h3>Datos del Encargado</h3>
                            <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Padre"> Padre</label>
                                    <input type="text" class="form-control"  name="padre"  value="<?php echo $data['Padre']; ?>"disabled>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Madre">Madre</label>
                                    <input type="text" class="form-control"  name="madre" value="<?php echo $data['Madre'] ?>"disabled>

                                </div>
                              </div>
                              <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Encargado</label>
                                <input type="text" name="encargado" class="form-control" value="<?php echo $data['Encargado']; ?>" disabled>
                            </div>
                          </div>




                            <div class="form-group mb-3">

                                    <a href="busqueda.php" class="btn btn-danger">Regresar</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php } ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php include_once "includes/footer.php"; ?>
