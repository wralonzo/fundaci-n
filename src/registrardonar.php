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
    $tituto = $_POST['tituto'];
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];
    $alert = "";
    if (empty($tituto) || empty($fecha) || empty($descripcion) || empty($imagen)) {
        $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Todo los campos son obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    } else {
        if (empty($id)) {
            $tituto = $_POST['tituto'];
            if (empty($tituto)) {
                $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    titulo es requerido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            } else {
                $tituto = $_POST['tituto'];
                $query = mysqli_query($conexion, "SELECT * FROM dona where tituto = '$tituto'");
                $result = mysqli_fetch_array($query);
                if ($result > 0) {
                    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    titulo ya existe
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                } else {
                    $query_insert = mysqli_query($conexion, "INSERT INTO dona(tituto,fecha,descripcion,imagen) values ('$tituto','$fecha','$descripcion','$imagen')");
                    if ($query_insert) {
                        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     Registrado Exito!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    //header("location: usuarios.php");
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
                        <label for="tituto">Titulo</label>
                        <input type="text" class="form-control" placeholder="Ingrese Titulo" name="tituto" id="tituto">
                        <input type="hidden" id="id" name="id">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" placeholder="Ingrese Fecha" name="fecha" id="fecha">

                    </div>
                  </div>

                  <div class="col-md-5">

                          <label for="">Foto</label>
                          <input type="file" class="form-control" name="imagen" id="imagen" >

                    </div>
                </div>
                  <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea  rows="5" class="form-control" placeholder="Ingrese Descripcion" name="descripcion" id="descripcion"></textarea>
                    </div>
                  </div>
                </div>


            <input type="submit" value="Guardar" class="btn btn-success" id="btnAccion">
            <a href="donacion.php" class="btn btn-danger">Regresar</a>

        </form>
    </div>

</div>

<?php include_once "includes/footer.php"; ?>
