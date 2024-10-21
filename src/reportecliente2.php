<?php
session_start();
$permiso = 'usuarios';
$id_user = $_SESSION['idUser'];
include "../conexion.php";
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p 
INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}
include "includes/header.php";
?>  <link rel="icon" type="image/x-icon" href="assets/img/logo-mywebsite-urian-viera.svg">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <body>
      <section>
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <form action="../DescargarReporte_x_fecha_PDF.php" method="post" accept-charset="utf-8">
                  <br>
                  <div class="row">
                    <div class="col">
                      <h4>Fecha Inicio</h4>
                      <input type="date" name="fecha_creacion" class="form-control"  placeholder="Fecha de Inicio" required>
                    </div>
                    <div class="col">
                    <h4>Fecha Final</h4>
                      <input type="date" name="fechaFin" class="form-control" placeholder="Fecha Final" required>
                    </div>


                    <div class="col">
                      </br>
                      <span class="btn btn-dark mb-2" id="filtro">Filtrar</span>
                      <button type="submit" class="btn btn-danger mb-2">Descargar Reporte PDF</button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="col-md-12 text-center mt-5">
                <span id="loaderFiltro">  </span>
              </div>

              <div class="col-md-12">
                  <div class="table-responsive">
                <div class="table-responsive resultadoFiltro">
                    <table class="table" id="tbl" id="tableEmpleados">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Nombre y Apellido</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Lugar</th>
                    <th>Fecha Ingreso</th>
                    <th>Usuario de</th>
                  </tr>
                </thead>
                <tbody>
              <?php
              include('../conexion.php');
              $sqlTrabajadores = ('SELECT * FROM cliente p INNER JOIN salud pr on 
  p.idusuario = pr.id WHERE p.idusuario = 2 ORDER BY p.fecha_creacion ASC

                ');



              $query = mysqli_query($conexion, $sqlTrabajadores);
              $i =1;
                while ($dataRow = mysqli_fetch_array($query)) { ?>

                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $dataRow['Nombre'] . ' '. $dataRow['Apellido']; ?></td>
                    <td><?php echo $dataRow['Telefono1'] ; ?></td>
                    <td><?php echo $dataRow['Direccion'] ; ?></td>
                    <td><?php echo $dataRow['Lugar_n'] ; ?></td>
                    <td><?php echo $dataRow['fecha_creacion'] ; ?></td>
                    <td><?php echo $dataRow['Descripcion'] ; ?></td>
                    
                </tr>

              <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
            </div>
          </div>
      </section>
    </div>
  </div>






  <script src="https://code.jquery.com/jquery-3.6.0.js"
   integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="../assets/js/material.min.js"></script>
  <script>
  $(function() {
      setTimeout(function(){
        $('body').addClass('loaded');
      }, 1000);


//FILTRANDO REGISTROS
$("#filtro").on("click", function(e){
  e.preventDefault();

  loaderF(true);

  var f_ad = $('input[name=fecha_creacion]').val();
  var f_fin = $('input[name=fechaFin]').val();
  console.log(f_ad + '' + f_fin);

  if(f_ad !="" && f_fin !=""){
    $.post("../filtro.php", {f_ad, f_fin}, function (data) {
      $("#tableEmpleados").hide();
      $(".resultadoFiltro").html(data);
      loaderF(false);
    });
  }else{
    $("#loaderFiltro").html('<p style="color:red;  font-weight:bold;">Debe seleccionar ambas fechas</p>');
  }
} );


function loaderF(statusLoader){
    console.log(statusLoader);
    if(statusLoader){
      $("#loaderFiltro").show();
      $("#loaderFiltro").html('<img class="img-fluid" src="../assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
    }else{
      $("#loaderFiltro").hide();
    }
  }
});
</script>

</body>
</html>

<?php include_once "includes/footer.php"; ?>
