
<?php



//action.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "programa");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM dona ORDER BY id DESC";
  $result = mysqli_query($connect, $query);
  $output = '

  <div class="table-responsive">
      <table class="table" id="tbl">
    <thead class="thead-dark" >
    <tr>
     <th width="10%">ID</th>
     <th width="20%">Titulo</th>
     <th width="20%">Fecha</th>
     <th width="20%">Descripcion</th>
     <th width="20%">Image</th>
     <th width="10%">Actualizar</th>
     <th width="10%">Eliminar</th>
    </tr>
        </thead>
  ';

  while($row = mysqli_fetch_array($result))
  {
   $output  .= '
   <tbody >
    <tr>
     <td>'.$row["id"].'</td>
     <td>'.$row["tituto"].'</td>
     <td>'.$row["fecha"].'</td>
     <td>'.$row["descripcion"].'</td>
     <td>
      <img src="data:image/jpeg;base64,'.base64_encode($row['imagen'] ).'" height="60" width="75" class="img-thumbnail" />
     </td>
     <td><button type="button" name="Guardar" class="btn btn-success bt-xs update" id="'.$row["id"].'">Actualizar</button></td>
     <td><button type="button" name="Eliminar" class="btn btn-danger bt-xs delete" id="'.$row["id"].'">Eliminar</button></td>
    </tr>
    </tbody>

   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
   $tituto =$_POST['tituto'];
    $fecha =$_POST['fecha'];
     $descripcion =$_POST['descripcion'];
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "INSERT INTO dona(tituto,fecha,descripcion,imagen) VALUES ('$tituto','$fecha','$descripcion','$file')";
  if(mysqli_query($connect, $query))
  {
   echo 'Guardado Correctamente';
  }
 }
 if($_POST["action"] == "update")
 {
   $tituto =$_POST['tituto'];
    $fecha =$_POST['fecha'];
     $descripcion =$_POST['descripcion'];
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE dona SET tituto ='$tituto', fecha='$fecha', descripcion='$descripcion', imagen = '$file' WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Actualizado Correctamente';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM dona WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Eliminado';
  }
 }
}

?>
