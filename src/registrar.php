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
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dpi = $_POST['dpi'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $user = $_POST['usuario'];
    $email=$_POST['correo'];
    $clave = $_POST['clave'];
    $alert = "";
    if (empty($nombre) || empty($email) || empty($user)) {
        $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Todo los campos son obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    } else {
        if (empty($id)) {
            $clave = $_POST['clave'];
            if (empty($clave)) {
                $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    La contraseña es requerido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            } else {
                $clave = md5($_POST['clave']);
                $query = mysqli_query($conexion, "SELECT * FROM usuario where correo = '$email'");
                $result = mysqli_fetch_array($query);
                if ($result > 0) {
                    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    El correo ya existe
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                } else {
                    $query_insert = mysqli_query($conexion, "INSERT INTO usuario(nombre,apellido,dpi,telefono,fecha_nacimiento,genero,usuario,correo,clave) values ('$nombre','$apellido','$dpi','$telefono','$fecha_nacimiento','$genero', '$user','$email','$clave')");
                    if ($query_insert) {
                        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usuario Registrado
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
    <h3>Datos Usuario Sistema</h3>
        <form action="" method="post" autocomplete="off" id="formulario">
            <?php echo isset($alert) ? $alert : ''; ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control" placeholder="  Ingrese Nombre" name="nombre" id="nombre">
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" placeholder=" Ingrese Apellidos" name="apellido" id="apellido">
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="dpi">DPI/CUI</label>
                        <input type="number" class="form-control" placeholder="  Ingrese N. DPI/CUI" name="dpi" id="dpi">
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="number" class="form-control" placeholder="  Ingrese Teléfono" name="telefono" id="telefono">
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" placeholder="  Ingrese Fecha Nacimiento" name="fecha_nacimiento" id="fecha_nacimiento">
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <input type="text" class="form-control" placeholder="  Ingrese Género" name="genero" id="genero">
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" placeholder="  Ingrese Usuario" name="usuario" id="usuario">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" class="form-control" placeholder="  Ingrese Correo Electrónico" name="correo" id="correo">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clave">Contraseña</label>
                        <input type="password" class="form-control" placeholder="  Ingrese Contraseña" name="clave" id="clave">
                    </div>
                </div>

            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-2">
                        <a href="usuarios.php" class="btn btn-danger">Regresar</a>
                    </div>
                    <div class="col-2">
                        <input type="submit" value="Guardar" class="btn btn-success" id="btnAccion">
                    </div>
                </div>
            </div>
            
        </form>
    </div>

</div>

<?php include_once "includes/footer.php"; ?>
