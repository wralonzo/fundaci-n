 <?php
          require("conexion.php");
          $conn=conectar();

          $count= current($con->query("SELECT count(idusuario) FROM 'clientes'
                    where idusuario= '1'")->fetch());
          echo "Valor".$count;
                    ?>
                        