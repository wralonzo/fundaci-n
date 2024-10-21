<?php
sleep(1);
include('config.php');

/**
 * Nota: Es recomendable guardar la fecha en formato año - mes y dia (2022-08-25)
 * No es tan importante que el tipo de fecha sea date, puede ser varchar
 * La funcion strtotime:sirve para cambiar el forma a una fecha,
 * esta espera que se proporcione una cadena que contenga un formato de fecha en Inglés US,
 * es decir año-mes-dia e intentará convertir ese formato a una fecha Unix dia - mes - año.
*/

$fechaInit = date("Y-m-d", strtotime($_POST['f_ad']));
$fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));

$sqlTrabajadores = ("SELECT * FROM cliente p INNER JOIN salud pr on p.idusuario = pr.id WHERE  p.idusuario = 2 AND p.idestado = 1 AND `fecha_creacion` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_creacion ASC");

$query = mysqli_query($con, $sqlTrabajadores);
//print_r($sqlTrabajadores);
$total   = mysqli_num_rows($query);
echo '<strong>Total: </strong> ('. $total .')';
?>

<table class="table table-hover">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre y Apellido</th>
          <th scope="col">Telefono</th>
          <!--<th scope="col">Direccion</th>
          <th scope="col">Lugar</th>-->
          <th scope="col">Fecha Ingreso</th>
          <th scope="col">Usuario de</th>

        </tr>
    </thead>
    <?php
    $i = 1;
    while ($dataRow = mysqli_fetch_array($query)) { ?>
        <tbody>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $dataRow['Nombre'] . ' '. $dataRow['Apellido']; ?></td>
            <td><?php echo $dataRow['Telefono1'] ; ?></td>
            <!--<td><?//php echo $dataRow['Direccion'] ; ?></td>
            <td><?//php echo $dataRow['Lugar_n'] ; ?></td>-->
            <td><?php echo $dataRow['fecha_creacion'] ; ?></td>
            <td><?php echo $dataRow['Descripcion'] ; ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>
