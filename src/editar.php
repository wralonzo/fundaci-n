<?php
session_start();
$permiso = 'usuarios';
$id_user = $_SESSION['idUser'];
include "../conexion.php";
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d 
ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}

include("../conexion.php");
$Nombre = '';
$Apellido ='';
$Dpi = '';
$Tele = '';
$Telefo = '';
$Telefon= '';




$Direccion = '';
$Lugar_n = '';
$Fecha_Nacimiento='';
$Edad='';

$N_expediente = '';
$Diagnostico ='';

$Observacion = '';
$idestado = '';
$idusuario = '';

$Padre = '';
$Madre='';
$Encargado = '';
$Telefono = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM cliente WHERE idcliente=$id";
  $result = mysqli_query($conexion, $query);
  if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_array($result);
    $Nombre = $data['Nombre'];
    $Apellido = $data['Apellido'];
    $Dpi = $data['Dpi'];
    $Tele = $data['Telefono1'];
    $Telefo = $data['Telefono2'];
    $Telefon= $data['Telefono3'];




    $Direccion = $data['Direccion'];
    $Lugar_n = $data['Lugar_n'];
    $Fecha_Nacimiento=$data['fecha_nacimiento'];
    $Edad=$data['edad'];

    $N_expediente = $data['N_expediente'];
    $Diagnostico = $data['diagnostico'];
      $Observacion = $data['Observacion'];
      $idestado=$data['idestado'];
      $idusuario=$data['idusuario'];
    $fecha_creacion=$data['fecha_creacion'];


    $Padre = $data['Padre'];
    $Madre=$data['Madre'];
    $Encargado = $data['Encargado'];
    $Telefono = $data['telefono'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $Nombre = $_POST['Nombre'];
  $Apellido = $_POST['Apellido'];
  $Dpi = $_POST['Dpi'];
  $Tele = $_POST['Telefono1'];
  $Telefo = $_POST['Telefono2'];
  $Telefon= $_POST['Telefono3'];




  $Direccion = $_POST['Direccion'];
  $Lugar_n = $_POST['Lugar_n'];
  $fecha_nacimiento=$_POST['fecha_nacimiento'];
  $Edad=$_POST['edad'];

  $N_expediente = $_POST['N_expediente'];
  $Diagnostico = $_POST['Diagnostico'];
    $Observacion = $_POST['Observacion'];
    $idestado=$data=$_POST['idestado'];
    $idusuario=$data=$_POST['idusuario'];


  $fecha_creacion=$_POST['Fecha_creacion'];


  $Padre = $_POST['Padre'];
  $Madre=$_POST['Madre'];
  $Encargado = $_POST['Encargado'];
  $Telefono = $_POST['Telefono'];

  $query = "UPDATE cliente set Nombre='$Nombre', Apellido='$Apellido',Dpi='$Dpi', Telefono1='$Tele',Telefono2='$Telefo',Telefono3='$Telefon',Direccion='$Direccion',
  Lugar_n='$Lugar_n',diagnostico='$Diagnostico',Observacion='$Observacion',idestado='$idestado',idusuario='$idusuario',
  fecha_creacion='$fecha_creacion',Padre='$Padre',Madre='$Madre',Encargado='$Encargado',telefono='$Telefono'
  WHERE idcliente=$id";
  mysqli_query($conexion, $query);
  $_SESSION['message'] = 'Actualizado';
  $_SESSION['message_type'] = 'success';
  header('Location: clientes.php');
}

?>
<?php include "includes/header.php";?>

                    <div class="card">

                        <div class="card-body">
                        <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST" 
                        autocomplete="off" id="formulario">
                        <h3>Datos del Paciente</h3>
                          <div class="row">
                        

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Nombre">Nombres</label>
                                    <input type="text" class="form-control"  name="Nombre"  value="<?php echo $data['Nombre']; ?>">
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Apellido">Apellidos</label>
                                    <input type="text" class="form-control"  name="Apellido" value="<?php echo $data['Apellido']; ?>">

                                </div>
                              </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">DPI/CUI</label>
                                  <input type="text" name="Dpi" class="form-control" value="<?php echo $data['Dpi']; ?>" >
                                </div>
                            </div>
                            

                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="Telefono1">Teléfono 1</label>
                                  <input type="text" class="form-control"  name="Telefono1" value="<?php echo $data['Telefono1'] ?>">
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Teléfono 2</label>
                                <input type="text" name="Telefono2" class="form-control" value="<?php echo $data['Telefono2']; ?>" >
                              </div>
                            </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Teléfono 3</label>
                            <input type="text" name="Telefono3" class="form-control" value="<?php echo $data['Telefono3']; ?>" >
                           </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="Direccion" class="form-control" value="<?php echo $data['Direccion']; ?>" >
                            </div>
                        </div>
                            
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="Lugar">Lugar de Nacimiento</label>
                              <input type="text" class="form-control"  name="Lugar_n" value="<?php echo $data['Lugar_n']; ?>">
                             </div>
                        </div>

                        <div class="col-md-2">
                           <div class="form-group">
                                <label for="Fecha_Nacimiento">Fecha Nacimiento</label>
                                 <input type="date" class="form-control"  name="Fecha_nacimiento" value="<?php echo $data['fecha_nacimiento']; ?>" disabled>
                            </div>
                        </div>
  
                        <div class="col-md-2">
                            <div class="form-group">
                               <label for="edad">Edad</label>
                                <input type="number" class="form-control" class="center" name="edad" value="<?php echo $data['edad']; ?>" disabled>
                            </div>
                         </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="Diagnostico">Diagnóstico</label>
                                  <input type="text" class="form-control" name="Diagnostico" value="<?php echo $data['diagnostico'] ?>">
                                  </br> <a href="registrarfecha.php?idcliente=<?php echo $data['idcliente']; ?>" class="btn btn-primary" >Fecha Reingreso</a>
                              </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Observación</label>
                                <input type="text" name="Observacion" class="form-control" value="<?php echo $data['Observacion']; ?>" >
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <input type="text" name="idestado" class="form-control" 
                                value="<?php echo $data['idestado']; ?>" >
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Usuario de</label>
                                <input type="text" name="idusuario" class="form-control" 
                                value="<?php echo $data['idusuario']; ?>" >
                            </div>
                          </div>





                          <div class="col-md-2">
                              <div class="form-group">
                                  <label for="N_expediente">No. Expediente</label>
                                  <input type="text" class="form-control"  name="expediente" value="<?php echo $data['N_expediente'] ?>" disabled>
                              </div>
                             
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Fecha Ingreso</label>
                              <input type="text" name="Fecha_creacion" class="form-control" value="<?php echo $data['fecha_creacion']; ?>" >
                            </div>
                          </div>


                        </div>
                        <h3>Datos del Encargado</h3>
                            <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Padre"> Padre</label>
                                    <input type="text" class="form-control"  name="Padre"  value="<?php echo $data['Padre']; ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Madre">Madre</label>
                                    <input type="text" class="form-control"  name="Madre" value="<?php echo $data['Madre'] ?>">

                                </div>
                              </div>


                          <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Encargado</label>
                                <input type="text" name="Encargado" class="form-control" value="<?php echo $data['Encargado']; ?>" >
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="Telefono">Telefono</label>
                                  <input type="text" class="form-control"  name="Telefono"  value="<?php echo $data['telefono']; ?>">
                              </div>
                          </div>


                          <div class="container">
                            <div class="row justify-content-center">
                              <div class="col-2">
                                  <a href="clientes.php" class="btn btn-danger">Regresar</a>
                              </div>
                              <div class="col-2">
                                  <button type="submit" name="update" class="btn btn-primary">Guardar</button>
                              </div>
                            </div>
                          </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>

 



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


<?php include_once "includes/footer.php"; ?>

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
