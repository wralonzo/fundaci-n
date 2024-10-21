<?php
if (empty($_SESSION['active'])) {
    header('Location: ../');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Fundabiem</title>
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/js/jquery-ui/jquery-ui.min.css">
    <script src="../assets/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper ">
            <div class="sidebar" data-color="" data-background-color="" data-image="../assets/img/programa.jpg">
            <div class="logo" align="center"><img src="../assets/img/programa.jpeg" height="80px">

              <p href="./" class="nav-item d-none d-sm-inline-block"></p>
              </div>
            <div class="sidebar-wrapper">
                <ul class="nav nav-pills">


                          <div class="card-header card-header-primary card-header-icon">
                              <div class="card-icon">
                                <li class="nav-item">
                                        <a class="nav-link active" href="./">
                                      <i class="fas fa-home mr-2 fa-2x"></i>
                                      Inicio
                                    </a>
                                </li>
                              </div>
                          </div>

                          <div class="card-header card-header-primary card-header-icon">
                              <div class="card-icon">
                                <li class="nav-item">
                                    <a class="nav-link active" href="clientes.php">
                                    <i class="fas fa-users mr-2 fa-2x"></i>
                                     Pacientes
                                   </a>
                                 </li>
                              </div>
                          </div>


                          <div class="card-header card-header-primary card-header-icon">
                              <div class="card-icon">
                                <li class="nav-item">
                                    <a class="nav-link active" href="fecha.php">
                                  <i class=" fas fa-clock mr-2 fa-2x"></i>
                                     Historial Reingreso
                                   </a>
                                 </li>
                              </div>
                          </div>


                          <div class="card-header card-header-primary card-header-icon">
                              <div class="card-icon">
                                <li class="nav-item">
                                    <a class="nav-link active" href="busqueda.php">
                                  <i class=" fas fa-search mr-2 fa-2x"></i>
                                     Búsqueda
                                   </a>
                                 </li>
                              </div>
                          </div>

                          <div class="card-header card-header-primary card-header-icon">
                              <div class="card-icon">
                                <li class="nav-item">
                                    <a class="nav-link active" href="dona.php">
                                  <i class=" fas fa-heart mr-2 fa-2x"></i>
                                     Donaciones
                                   </a>
                                 </li>
                              </div>
                          </div>

                            <div class="card-header card-header-primary card-header-icon">
                              <div class="card-icon">
                                <li class="nav-item">
                                    <a class="nav-link active" href="reportes.php">
                                  <i class=" fas fa-file mr-2 fa-2x"></i>
                                   Reportes
                                   </a>
                                 </li>
                              </div>
                          </div>


      

                          <div class="card-header card-header-primary card-header-icon">
                              <div class="card-icon">
                                <li class="nav-item">
                                    <a class="nav-link active" href="usuarios.php">
                                  <i class="fas fa-user mr-2 fa-2x"></i>
                                    Usuarios del Sistema
                                   </a>
                                 </li>
                              </div>
                          </div>


                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <h3 class="nav-item d-none d-sm-inline-block">Fundabiem</h3>

                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                  </div>
                  <div>
                    <div class="collapse navbar-collapse justify-content-end">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                    <p class="d-lg-none d-md-block">
                                        Cuenta
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#nuevo_pass">Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="salir.php">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content bg">
