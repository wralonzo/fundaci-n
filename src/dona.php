<?php
session_start();
include "../conexion.php";
$id_user = $_SESSION['idUser'];
$permiso = "dona";
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}
include "includes/header.php";
?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <form action="" method="post" autocomplete="off" id="formulario">

              <div class="row">
        <div class="col-md-3">
           <button type="button" name="add" id="add" class="btn btn-success">Nueva Donacion</button>

        </form>

  </div>
    </div>

   <div id="image_data">

   </div>


  </div>

 <div id="imageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h5 class="modal-title">Editar</h5>
    </div>
    <div class="modal-body">
     <form id="image_form" method="post" enctype="multipart/form-data">


      <div class="form-group">
        <label for="">Titulo</label>
      <input type="text" name="tituto" id="tituto" required/></p><br />
      </div>

      <div class="form-group">
        <label for="">Fecha</label>
      <input type="date" name="fecha" id="fecha" required/></p><br />
      </div>

      <div class="form-group">
        <label for="">Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" required/></p><br />
      </div>


      <p><label>Seleccione Imagen (maximo 2Mb)</label>
     <input type="file" name="image" id="image" /></p><br />
     <input type="hidden" name="action" id="action" value="insert" />
     <input type="hidden" name="image_id" id="image_id" />
     <input type="submit" name="Guardar" id="Guardar" value="Guardar" class="btn btn-info" />



    </form>
   </div>

   <div class="modal-footer">

    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>

<script>
$(document).ready(function(){

 fetch_data();

 function fetch_data()
 {
  var action = "fetch";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 $('#add').click(function(){
  $('#imageModal').modal('show');
  $('#image_form')[0].reset();
  $('.modal-title').text("");
  $('#image_id').val('');
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
 $('#image_form').submit(function(event){
  event.preventDefault();
    var tituto_name = $('#tituto').val();
      var fecha_name = $('#fecha').val();
        var descripcion_name = $('#descripcion').val();
          var image_name = $('#image').val();

  if(image_name == '')
  {
   alert("Please Select Image");
   return false;
  }
  else
  {
   var extension = $('#image').val().split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Imagen Invalido");
    $('#image').val('');
    return false;
   }
   else
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#image_form')[0].reset();
      $('#imageModal').modal('hide');
     }
    });
   }
  }
 });
 $(document).on('click', '.update', function(){
  $('#image_id').val($(this).attr("id"));
  $('#action').val("update");
  $('.modal-title').text("Actualizar");
  $('#Guardar').val("Guardar");
  $('#imageModal').modal("show");
 });
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var action = "delete";
  if(confirm("Esta Seguro Desea Eliminar?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{image_id:image_id, action:action},
    success:function(data)
    {
     alert(data);
     fetch_data();
    }
   })
  }
  else
  {
   return false;
  }
 });
});
</script>


