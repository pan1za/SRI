<?php

include "../include/head.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistemas de Reportes Innova</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../dist/img/logo.png" alt="SRILogo" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../home" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../pages/examples/contact-us.html" class="nav-link">Contáctenos</a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="home" class="brand-link">
        <img src="../dist/img/logo.png" alt="SRI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema de Reportes</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/perfiles/<?php echo $foto ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="../pages/perfil" class="d-block"><?php echo $nombres . ' ' . $apellidos ?></a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Mi cuenta
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../pages/perfil" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perfil</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../action/cerrarSesion" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cerrar sesión</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php if ($my_user_type == "user") { ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Reportar
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="incapacidad" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Incapacidad</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="horasExtras" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Horas extras</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="recargo" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recargo</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  <?php
                  if ($my_user_type == "user") { ?>
                    Mis reportes
                  <?php
                  } elseif ($my_user_type == "admin") { ?>
                    Reportes
                  <?php
                  }
                  ?>
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="reporteHorasExtras" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horas extras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="reporteRecargo" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recargo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="reporteIncapacidad" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Incapacidad</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php if ($my_user_type == "admin") { ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Listar
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="reporteEmpleados" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Empleados</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
            <?php if ($my_user_type == "admin") { ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-plus-circle"></i>
                  <p>
                    Crear
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="crearEmpleado" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Empleado</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
          </ul>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Bienvenido <?php echo $nombres . ' ' . $apellidos ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Bienvenida</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At provident deleniti natus non! Optio, itaque veniam! Adipisci, minus saepe, iusto accusantium nulla laborum at eum ipsum numquam sequi iste mollitia?</p>
        </div>
      </section>
    </div>

    <?php
    include "../include/footer.php";
    ?>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>



  <?php
  include "../include/scripts.php";
  ?>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
</body>

</html>