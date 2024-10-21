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
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Dpi = $_POST['Dpi'];
    $Tele = $_POST['Tele'];
    $Telefo = $_POST['Telefo'];
    $Telefon= $_POST['Telefon'];

    $Direccion = $_POST['Direccion'];
    $Lugar_n = $_POST['Lugar_n'];
    $Fecha_nacimiento=$_POST['fecha_nacimiento'];
    $Edad = $_POST['edad'];

    $Genero=$_POST['Genero'];
    $idusuario=$_POST['Usuario'];
    $idestado=$_POST['Estado'];

    $Expediente =$_POST['expediente'];
    $diagnostico=$_POST['diagnostico'];
    $Observacion = $_POST['Observacion'];
    $Fecha1 = $_POST['Fecha1'];


    $Padre = $_POST['Padre'];
    $Madre=$_POST['Madre'];
    $Encargado = $_POST['Encargado'];
    $Telefono = $_POST['Telefono'];

    $alert = "";
    if (empty($Nombre) || empty($Apellido) || empty($Dpi)) {
        $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Todo los campos son obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    } else {
        if (empty($id)) {
            $Nombre = $_POST['Nombre'];
            if (empty($Nombre)) {
                $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Nombre es requerido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            } else {
                $Nombre = ($_POST['Nombre']);
                $query = mysqli_query($conexion, "SELECT * FROM cliente where Nombre = '$Nombre'");
                $result = mysqli_fetch_array($query);
                if ($result > 0) {
                    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Nombre ya existe
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                } else {
  $query_insert = mysqli_query($conexion, "INSERT INTO cliente(Nombre,Apellido,Dpi,Telefono1,Telefono2,Telefono3,Direccion,Lugar_n,fecha_nacimiento,edad,Genero,idusuario,idestado,N_expediente,diagnostico,Observacion,fecha_creacion,Padre,Madre,Encargado,telefono) values ('$Nombre','$Apellido','$Dpi','$Tele','$Telefo','$Telefon','$Direccion','$Lugar_n','$Fecha_nacimiento','$Edad','$Genero','$idusuario','$idestado','$Expediente','$diagnostico','$Observacion','$Fecha1','$Padre','$Madre','$Encargado','$Telefono')");
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
        }
    }
}
include "includes/header.php";
?>

<div class="card">
    <div class="card-body">
        <form action="" method="post" autocomplete="off" id="formulario">
            <?php echo isset($alert) ? $alert : ''; ?>

            <h3>Datos del Paciente</h3>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Nombre">Nombres</label>
                        <input type="text" class="form-control" placeholder="  Ingrese Nombres" name="Nombre" id="Nombre" required>
                        <input type="hidden" id="id" name="id">
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Apellido">Apellidos</label>
                        <input type="text" class="form-control" placeholder="  Ingrese Apellidos" name="Apellido" id="Apellido" required>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Dpi">DPI/CUI</label>
                        <input type="number" class="form-control" placeholder="  Ingrese N. DPI/CUI" name="Dpi" id="Dpi" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Tele">Teléfono 1</label>
                        <input type="number" class="form-control" placeholder="  Ingrese Teléfono 1" name="Tele" id="Tele" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Telefo">Teléfono 2</label>
                        <input type="number" class="form-control" placeholder="  Ingrese Teléfono 2" name="Telefo" id="Telefo">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Telefon">CELULAR 3</label>
                        <input type="number" class="form-control" placeholder="  Ingrese Teléfono 3" name="Telefon" id="Telefon">
                    </div>
                </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Direccion">Dirección</label>
                            <input type="text" class="form-control" placeholder="  Ingrese Dirección" name="Direccion" id="Direccion" required>
                        </div>
                    </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Lugar_n">Lugar de Nacimiento</label>
                        <input type="text" class="form-control" placeholder="  Ingrese Lugar de Nac." name="Lugar_n" id="Lugar_n" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="Fecha_Nacimiento">Fecha Nacimiento</label>
                        <input type="date" class="form-control" placeholder="Ingrese Fecha" name="fecha_nacimiento" id="fecha_nacimiento" onchange="value_edad(this.value);" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                      <label for="Edad">Edad</label>
                    <input type="number" class="form-control"  name="edad" id="edad" >
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="Genero">Genero</label>
                        <select class="form-control" placeholder="Seleccionar" name="Genero" id="Genero" required>
                            <option value="">Seleccione</option>
                        <?php
                        include '../conexion.php';
                        $sql = "SELECT * FROM genero";
                        $query = mysqli_query($conexion,$sql);
                        while ($data = mysqli_fetch_assoc($query))
                        {
                            $id = $data['id'];
                            $nombre = $data['Descripcion'];

                        ?>
                    <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                        <?php
                        }
                        ?>
                        </select>
                      </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Usuario">Usuario de</label>
                            <select class="form-control" placeholder="Seleccionar" name="Usuario" id="Usuario" required>
                            <option value="">Seleccione</option>
                            <?php
                            include '../conexion.php';
                            $sql = "SELECT * FROM salud";
                            $query = mysqli_query($conexion,$sql);
                            while ($data = mysqli_fetch_assoc($query))
                            {
                            $id = $data['id'];
                            $nombr = $data['Descripcion'];

                            ?>
                        <option value="<?php echo $id; ?>"><?php echo $nombr; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
              <label for="Estado">Estado</label>
                  <select class="form-control" class="form-select" name="Estado" id="Estado" required>
                    <option selected="">Seleccione</option>
                  <?php
                  include '../conexion.php';
                  $sql = "SELECT * FROM estado";
                  $query = mysqli_query($conexion,$sql);
                  while ($data = mysqli_fetch_assoc($query))
                  {
                    $id = $data['id'];
                    $nmbre = $data['Descripcion'];

                  ?>
              <option value="<?php echo $id; ?>"><?php echo $nmbre; ?></option>
                  <?php
                   }
                  ?>
                  </select>
                  </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Diagnostico">Diagnóstico</label>
                    <input type="text" class="form-control" placeholder="  Ingrese Diagnostico" name="diagnostico" id="diagnostico" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="Observacion">Observación</label>
                    <input type="text" class="form-control" placeholder="  Ingrese Observacion" name="Observacion" id="Observacion" required>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="N.expediente">No Expediente</label>
                    <input type="number " class="form-control"  placeholder="  Ingrese No. Expediente" name="expediente" id="expediente" required>
                </div>
            </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label for="Fecha">Fecha Ingreso</label>
                        <input type="date" class="form-control" placeholder="  Ingrese Fecha de Hoy" name="Fecha1" id="Fecha1" required>
                    </div>
                </div>

              </div>

              <h3>Datos del Encargado</h3>

                  <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="Padre">Padre</label>
                        <input type="text" class="form-control" placeholder="  Ingrese Nombres" name="Padre" id="Padre">
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="Madre">Madre</label>
                        <input type="text" class="form-control" placeholder="  Ingrese Nombres" name="Madre" id="Madre">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="Encargado">Encargado</label>
                        <input type="text" class="form-control" placeholder="  Ingrese nombres" name="Encargado" id="Encargado">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="Tele">Teléfono</label>
                        <input type="number" class="form-control" placeholder="  Ingrese Teléfono" name="Telefono" id="Telefono"></br>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-2">
                            <a href="clientes.php" class="btn btn-danger">Regresar</a>
                        </div>
                        <div class="col-2">
                            <input type="submit" value="Guardar" class="btn btn-success" id="btnAccion">
                        </div>
                    </div>
                </div>

        </form>
    </div>

</div>
<script>
    function value_edad(fecha){
        var array_fecha = fecha.split("-");
        mes_nacim = parseInt(array_fecha[1].toString());
        anio_nacim = parseInt(array_fecha[0].toString());
        dia_nacim = parseInt(array_fecha[2].toString());

        fecha_hoy = new Date();
    ahora_anio = fecha_hoy.getYear();
    ahora_mes = fecha_hoy.getMonth();
    ahora_dia = fecha_hoy.getDate();
    edad = (ahora_anio + 1900) - anio_nacim;
    if ( ahora_mes < (mes_nacim - 1))
    {
      edad--;
    }
    if (((mes_nacim - 1) == ahora_mes) && (ahora_dia < dia_nacim))
    {
      edad--;
    }
    if (edad > 1900)
    {
    edad -= 1900;
    }

        document.getElementById("edad").value = edad;
    }
</script>
