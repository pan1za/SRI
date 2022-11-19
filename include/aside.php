<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="../index" class="brand-link">
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
        <li class="nav-item <?php echo $menuOpenMiCuenta ?>">
          <a href="#" class="nav-link <?php echo $activePerfil ?>">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Mi cuenta
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="perfil" class="nav-link <?php echo $activePerfil ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Perfil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../action/cerrarSesion" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cerrar Sesión</p>
              </a>
            </li>
          </ul>
        </li>
        <?php if ($my_user_type == "user") { ?>
          <li class="nav-item <?php echo $menuOpenRepor1 . $menuOpenRepor2 . $menuOpenRepor3 ?>">
            <a href="#" class="nav-link <?php echo $activeInc . $activeHorasE . $activeRecar ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reportar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="incapacidad" class="nav-link <?php echo $activeInc ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Incapacidad</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="horasExtras" class="nav-link <?php echo $activeHorasE ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Horas extras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="recargo" class="nav-link <?php echo $activeRecar ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recargo</p>
                </a>
              </li>
            </ul>
          </li>
        <?php
        }
        ?>
        <li class="nav-item <?php echo $menuOpenMisRepor1 . $menuOpenMisRepor2 . $menuOpenMisRepor3 ?>">
          <a href="#" class="nav-link <?php echo $activeMiRepHorasE . $activeMiRepRec . $activeMiRepInc?>">
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
              <a href="reporteHorasExtras" class="nav-link <?php echo $activeMiRepHorasE ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Horas extras</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reporteRecargo" class="nav-link <?php echo $activeMiRepRec ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Recargo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reporteIncapacidad" class="nav-link <?php echo $activeMiRepInc ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Incapacidad</p>
              </a>
            </li>
          </ul>
        </li>
        <?php if ($my_user_type == "admin") { ?>
          <li class="nav-item <?php echo $menuOpenListar ?>">
            <a href="#" class="nav-link <?php echo $activeListEmp ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Listar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item     ">
                <a href="reporteEmpleados" class="nav-link <?php echo $activeListEmp ?>">
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
          <li class="nav-item <?php echo $menuOpenCrear ?>">
            <a href="#" class="nav-link <?php echo $activeCrearEmp ?> ">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Crear
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="crearEmpleado" class="nav-link <?php echo $activeCrearEmp ?> ">
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

<script>

</script>