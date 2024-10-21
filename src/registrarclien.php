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
    $id = $_POST['id'];
    $fecha_ad = $_POST['Fecha_ad'];
    $n_expediente=$_POST['n_expediente'];
    $Name = $_POST['Nombre'];

    $alert = "";
    if (empty($fecha_ad) || empty($n_expediente) ) {
        $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Todo los campos son obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    } else {
        if (empty($id)) {
            $fecha_ad = $_POST['Fecha_ad'];
            if (empty($fecha_ad)) {
                $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Fecha es requerido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            } else {
                $fecha_ad = ($_POST['Fecha_ad']);
                $query = mysqli_query($conexion, "SELECT * FROM fechaad where Fecha_ad = '$fecha_ad'");
                $result = mysqli_fetch_array($query);
                if ($result > 0) {
                    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Fecha ya existe
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                } else {
                    $query_insert = mysqli_query($conexion, "INSERT INTO fechaad(Fecha_ad, N_expediente, Nombre) values ('$fecha_ad','$n_expediente','$Name')");
                    if ($query_insert) {
                        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Registrado
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
        }
    }
}
include "includes/header.php";
?>


<div class="card">
    <div class="card-body">
        <form action="" method="post" autocomplete="off" id="formulario">

            <?php echo isset($alert) ? $alert : ''; ?>

            <div class="row">


                <div class="col-md-3">
                    <div class="form-group">
                        <label for="Fecha_ad">Fecha Ad</label>
                        <input type="date" class="form-control" placeholder="Ingrese Fecha" name="Fecha_ad" id="Fecha_ad" required>
                        <input type="hidden" id="id" name="id">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="n_expediente">N. Expediente</label>
                        <input type="text" class="form-control" placeholder="Ingrese N. Expediente" name="n_expediente" id="n_expediente" required>

                    </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                  <label for="Nombre">Nombre</label>
                      <select class="form-control" placeholder="Seleccionar" name="Nombre" id="Nombre">
                        <option value="">Seleccione</option>
                      <?php
                      include '../conexion.php';
                      $sql = "SELECT * FROM cliente";
                      $query = mysqli_query($conexion,$sql);
                      while ($data = mysqli_fetch_assoc($query))
                      {
                        $id = $data['idcliente'];
                        $nomb = $data['Nombre'];
                        $apellido=$data['Apellido'];


                      ?>
                  <option value="<?php echo $id; ?>"><?php echo $nomb.'  '.$apellido; ?></option>
                      <?php
                       }
                      ?>
                      </select>
                      </div>
                </div>



                <div class="">
                  <input type="submit" value="Guardar" class="btn btn-success" id="btnAccion">
                  <a href="fecha.php" class="btn btn-danger">Regresar</a>
                </div>

        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.map"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</div>
