<!-- Sidebar Menu -->
<nav class="mt-2">
  <li class=" header" style="color:#ffffff;"><?php if ($Id_Cargo == "1") echo ("Administrador en Linea") ?></li>
  <?php
  if ($Id_Cargo == "1") { ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item">

        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Uasuario
            <i class="right fas fa-angle-left"></i>
          </p>

        </a>

        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="usuarios/index.php" class="nav-link">
              <i class="far fa-user"></i>
              <p>Lista de Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="usuarios/create.php" class="nav-link">
              <i class="far fa-user"></i>
              <p>Crear Usuario</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../rutaalmar/principal.php" class="nav-link">
              <i class="far fa-user"></i>
              <p>Usuario Logeado</p>
            </a>
          </li>

        </ul>
      </li>
    </ul>
</nav>




<!-- /.sidebar-menu -->
<?php

  }

  if ($Id_Cargo == "12") { ?>
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">

      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          LIBROS DE ESTACIÓN
          <i class="right fas fa-angle-left"></i>
        </p>

      </a>

      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="asistencia/registro_asistencia.php" class="nav-link">

            <i class="far fa-user"></i>
            <p>Asistencia</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="usuarios/create.php" class="nav-link">
            <i class="far fa-user"></i>
            <p>Boleteria</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../rutaalmar/principal.php" class="nav-link">
            <i class="far fa-user"></i>
            <p>Caja_Fuerte</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="usuarios/create.php" class="nav-link">
            <i class="far fa-user"></i>
            <p>Caja_Menor</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="usuarios/create.php" class="nav-link">
            <i class="far fa-user"></i>
            <p>Combustible</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="usuarios/create.php" class="nav-link">
            <i class="far fa-user"></i>
            <p>Consignaciones</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="usuarios/create.php" class="nav-link">
            <i class="far fa-user"></i>
            <p>Fondo_Recambio</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="usuarios/create.php" class="nav-link">
            <i class="far fa-user"></i>
            <p>Mantenimiento</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="usuarios/create.php" class="nav-link">
            <i class="far fa-user"></i>
            <p>Novedad</p>
          </a>
        </li>

      </ul>
    </li>
  </ul>
  </nav>


<?php

  }
  if ($Id_Cargo == "4") { ?>
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
    <li class="nav-item">

      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Uasuario
          <i class="right fas fa-angle-left"></i>
        </p>

      </a>
    <li class="nav-header">LIBROS DE ESTACIÓN</li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">Important</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>Warning</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-info"></i>
        <p>Informational</p>
      </a>
    </li>
  </ul>
  </nav>

<?php

  }

?>