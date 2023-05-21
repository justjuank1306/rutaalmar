<nav class="mt-2">

                    <?php
                    if ($Id_Cargo == "14") { ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item">

                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Libros de Estación
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="Registro_Asistencia_Sup_Entrada.php" class="nav-link">
                                            <i class="far fa-user"></i>
                                            <p>Asistencia Entrada</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="Registro_Asistencia_Sup_Salida.php" class="nav-link">
                                            <i class="far fa-user"></i>
                                            <p>Asistencia Salida</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../rutaalmar/principal.php" class="nav-link">
                                            <i class="far fa-user"></i>
                                            <p>Usuario Logueado</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                </nav>




                <!-- /.sidebar-menu -->
            <?php

                    }
            ?>


  

  