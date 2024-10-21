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
<h3 class="text-center">Pacientes</h3>
<div class="card">
    <div class="card-body">
    
        <form action="registrarcliente.php" method="post" autocomplete="off" id="formulario">

            <div class="row">
                <div class="col-md-3">
                  <input type="submit" value="Nuevo Paciente" class="btn btn-primary" id="btnAccion">

                </div>
            </div>
                  </form>
<div class="table-responsive">
    <table class="table" id="tbl">
        <thead class="thead-dark">
            <tr >
               
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DPI/CUI</th>
                <th>Telefono</th>
                <th>Fecha Ingreso</th>
                <th>No Expediente</th>
                <th>Herramientas</th>

            </tr>
        </thead>
        <tbody class="thead-dark">
            <?php
            $query = mysqli_query($conexion, "SELECT * from cliente");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                       
                        <td><?php echo $data['Nombre']; ?></td>
                        <td><?php echo $data['Apellido']; ?></td>
                        <td><?php echo $data['Dpi']; ?></td>
                        <td><?php echo $data['Telefono1']; ?></td>
                        <td><?php echo $data['fecha_creacion']; ?></td>
                        <td><?php echo $data['N_expediente']; ?></td>

                        <td>
                          <a href="editar.php?id=<?php echo $data['idcliente']; ?>" class="btn btn-success" >Editar</a>
                            <form action="eliminar_cliente.php?id=<?php echo $data['idcliente']; ?>" method="post" class="confirmar d-inline">
                                <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>

                            </form>

                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>

</div>

  </div>

<?php include_once "includes/footer.php"; ?>
