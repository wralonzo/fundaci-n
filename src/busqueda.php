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
<h3 class="text-center">Búsqueda Pacientes</h3>
<div class="card">
    <div class="card-body">

                  <div class="table-responsive">
                      <table class="table" id="tbl">
        <thead class="thead-dark">
            <tr>
                
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DPI/CUI</th>
                <th>Telefono</th>
                <th>No. Expediente</th>
                <th>Herramienta</th>
                    

            </tr>
        </thead>
        <tbody class="thead-dark">
            <?php
            $query = mysqli_query($conexion, "SELECT p.idcliente, p.Nombre, p.Apellido, p.Dpi, p.Telefono1,p.N_expediente, p.Direccion, p.Lugar_n, pr.Descripcion, p.Padre, p.Madre from cliente p
              INNER JOIN genero pr
              ON
              p.Genero = pr.id
              ");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        
                        <td><?php echo $data['Nombre']; ?></td>
                        <td><?php echo $data['Apellido']; ?></td>
                        <td><?php echo $data['Dpi']; ?></td>
                        <td><?php echo $data['Telefono1']; ?></td>
                        <td><?php echo $data['N_expediente']; ?></td>

                        <td>
                                <a href="editar1.php?id=<?php echo $data['idcliente']; ?>" class="btn btn-info" >Ver Información</a>
                      
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

<?php include_once "includes/footer.php"; ?>
