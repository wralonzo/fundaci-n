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
$query = mysqli_query($conexion, "SELECT * FROM cliente WHERE idcliente = $id");
while ($data = mysqli_fetch_assoc($query)) { ?>
               
                    
                    <div class="card">
                        <div class="card-body">
                        <h3>Informacion del Paciente</h3>
                        <form action="editar_clientes.php" method="POST"  autocomplete="off" id="formulario">
                          <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="Nombre">Nombres</label>
                                    <input type="text" class="form-control"  name="nombre"  value="<?php echo $data['Nombre']; ?>" disabled>
                            </div>
                          </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Apellido">Apellidos</label>
                                    <input type="text" class="form-control"  name="apellido" value="<?php echo $data['Apellido'] ?>"disabled>

                                </div>
                              </div>
                                <div class="col-md-4">
                            <div class="form-group">
                                <label for="">DPI/CUI</label>
                                <input type="text" name="dpi" class="form-control" value="<?php echo $data['Dpi']; ?>" disabled>
                            </div>
                          </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Telefono">Teléfono 1</label>
                                    <input type="text" class="form-control"  name="telefono"  value="<?php echo $data['Telefono1']; ?>"disabled>
                                </div>
                            </div>

                    <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Telefono2">Teléfono 2</label>
                                    <input type="text" class="form-control"  name="telefono2"  value="<?php echo $data['Telefono2']; ?>"disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Telefono3">Teléfono 3</label>
                                    <input type="text" class="form-control"  name="telefono3"  value="<?php echo $data['Telefono3']; ?>"disabled>
                                </div>
                            </div>

                              <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion" class="form-control" value="<?php echo $data['Direccion']; ?>" disabled>
                            </div>
                          </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Lugar">Lugar de Nacimiento</label>
                                    <input type="text" class="form-control"  name="lugar_n" value="<?php echo $data['Lugar_n'] ?>"disabled>

                                </div>
                              </div>

                         <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Lugar">Fecha de Nacimiento</label>
                                    <input type="text" class="form-control"  name="fecha_nacimiento" value="<?php echo $data['fecha_nacimiento'] ?>"disabled>

                                </div>
                              </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">No. Expediente</label>
                                <input type="text" name="observacion" class="form-control" value="<?php echo $data['N_expediente']; ?>" disabled>
                            </div>
                          </div>

                           <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Diagnostico</label>
                                <input type="text" name="observacion" class="form-control" value="<?php echo $data['diagnostico']; ?>" disabled>
                            </div>
                          </div>

                              <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Observación</label>
                                <input type="text" name="observacion" class="form-control" value="<?php echo $data['Observacion']; ?>" disabled>
                            </div>
                          </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="fecha2">Fecha de Admisión</label>
                                    <input type="text" class="form-control"  name="fecha2" value="<?php echo $data['fecha_creacion'] ?>"disabled>

                                </div>
                              </div>

                        </div>
                        <h3>Información del Encargado</h3>
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

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" name="encargado" class="form-control" value="<?php echo $data['telefono']; ?>" disabled>
                            </div>
                          </div>


                            <div class="form-group mb-3">

                                    <a href="busqueda.php" class="btn btn-danger">Regresar</a>
                            </div>

                        </form>

                    </div>
                </div>
        

  <?php } ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php include_once "includes/footer.php"; ?>
