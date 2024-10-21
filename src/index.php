<?php
//0
require "../conexion.php";
$usuarios = mysqli_query($conexion, "SELECT * FROM usuario");
$total['usuarios'] = mysqli_num_rows($usuarios);


//1
$Masculino = mysqli_query($conexion, "SELECT p.idcliente, r.Descripcion FROM cliente p INNER JOIN genero r 
ON
p.Genero = r.id
WHERE 
Genero = '1'");
$to = mysqli_num_rows($Masculino);



$Femenino = mysqli_query($conexion, "SELECT  p.idcliente, r.Descripcion FROM cliente p INNER JOIN genero r 
ON
p.Genero = r.id
WHERE 
Genero = '2'");
$tota = mysqli_num_rows($Femenino);

$Fundabiem = mysqli_query($conexion, "SELECT p.idcliente, r.Descripcion FROM cliente p INNER JOIN salud r 
ON
p.idusuario = r.id
WHERE 
idusuario = '1'");
$tote = mysqli_num_rows($Fundabiem);

$Ministerio = mysqli_query($conexion, "SELECT p.idcliente, r.Descripcion FROM cliente p INNER JOIN salud r 
ON
p.idusuario = r.id
WHERE 
idusuario = '2'");
$totes = mysqli_num_rows($Ministerio);


//espera ahorita regreso 
//2
$clientes = mysqli_query($conexion, "SELECT * FROM cliente");
$total['clientes'] = mysqli_num_rows($clientes);



//3
$presentacion = mysqli_query($conexion, "SELECT * FROM dona");
$total['dona'] = mysqli_num_rows($presentacion);

session_start();
include_once "includes/header.php";
?>
<!-- Content Row -->
<h3>Inicio</h3></br>
<div class="row">

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-user fa-2x"></i>
                </div>
                <a href="usuarios.php" class="card-category text-dark font-weight-bold">
                    Usuarios del sistema
                </a>
                <h3 class="card-title"><?php echo $total['usuarios']; ?></h3>
            </div>
            <div class="card-footer bg-warning text-white">
            </div>
        </div>
    </div>


        <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <a href="clientes.php" class="card-category text-dark font-weight-bold">
                   Total Pacientes
                </a>
                <h3 class="card-title"><?php echo $total['clientes']; ?></h3>
            </div>
            <div class="card-footer bg-secondary text-white">
            </div>
        </div>
    </div>
  

      


    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="far fa-heart fa-2x"></i>
                </div>
                <a href="donacion.php" class="card-category text-dark font-weight-bold">
                    Total Donaciones
                </a>
                <h3 class="card-title"><?php echo $total['dona']; ?></h3>
            </div>
            <div class="card-footer bg-danger">
            </div>
        </div>
    </div>


    <div class="col-lg-5 col-md-4 col-sm-4">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="far fa fa-male fa-2x"></i>
                </div>
                 <a href="clientes.php" class="card-category text-dark font-weight-bold">
                    Total Masculino
                </a>
                <h3 class="card-title"><?php echo $to; ?></h3>
            </div>
            <div class="card-footer bg-success">
            </div>
        </div>
    </div>


    <div class="col-lg-5 col-md-5 col-sm-5">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="far fa fa-female fa-2x"></i>
                </div>
                 <a href="clientes.php" class="card-category text-dark font-weight-bold">
                    Total Femenino
                </a>
                <h3 class="card-title"><?php echo $tota; ?></h3>
            </div>
            <div class="card-footer bg-success">
            </div>
        </div>
    </div>




     <div class="col-lg-5 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-user fa-2x"></i>
                </div>
                 <a href="clientes.php" class="card-category text-dark font-weight-bold">
                    Total Pacientes Fundabiem
                </a>
                <h3 class="card-title"><?php echo $tote; ?></h3>
            </div>
            <div class="card-footer bg-info">
            </div>
        </div>
    </div>


     <div class="col-lg-5 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                 <a href="clientes.php" class="card-category text-dark font-weight-bold">
                    Total Pacientes Ministerio salud
                </a>
                <h3 class="card-title"><?php echo $totes; ?></h3>
            </div>
            <div class="card-footer bg-info">
            </div>
        </div>
    </div>


<!--
        <div class="card">
            <div class="card-body">

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tbl">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <?php
                                    include "../conexion.php";

                                    $query = mysqli_query($conexion, "SELECT p.idcliente,p.Nombre,p.Apellido,p.Telefono1, pr.Descripcion,p.edad FROM cliente p INNER JOIN genero pr on p.Genero = pr.id
                                        where 
                                        Genero = '1'");
                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <tr>
                                                <td><?php echo $data['idcliente']; ?></td>
                                                <td><?php echo $data['Nombre'].'  '.$data['Apellido']; ?></td>
                                                <td><?php echo $data['Telefono1']; ?></td>
                                                <td><?php echo $data['Descripcion']; ?></td>
                                                <td><?php echo $data['edad']; ?></td>
                                                <td>

                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
      </div>

      <div class="card-header">
            Cantidad de Femenino
        </div>


        <div class="card">
            <div class="card-body">

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tbl">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <?php
                                    include "../conexion.php";

                                    $query = mysqli_query($conexion, "SELECT p.idcliente,p.Nombre,p.Apellido,p.Telefono1, pr.Descripcion,p.edad FROM cliente p INNER JOIN genero pr on p.Genero = pr.id
                                        where 
                                        Genero = '2'");
                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <tr>
                                                <td><?php echo $data['idcliente']; ?></td>
                                                <td><?php echo $data['Nombre'].'  '.$data['Apellido']; ?></td>
                                                <td><?php echo $data['Telefono1']; ?></td>
                                                <td><?php echo $data['Descripcion']; ?></td>
                                                <td><?php echo $data['edad']; ?></td>
                                                <td>

                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
                                
    </div>
//finaliza
-->



<?php include_once "includes/footer.php"; ?>
