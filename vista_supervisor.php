<nav class="mt-2">

                    <?php
                    if ($Id_Cargo == "12") { ?>
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
                                        <a href="registro_asistencia_sup_entrada.php" class="nav-link">
                                            <i class="far fa-user"></i>
                                            <p>Asistencia Entrada</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="registro_asistencia_sup_salida.php" class="nav-link">
                                            <i class="far fa-user"></i>
                                            <p>Asistencia Salida</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                            <a href="registro_cajamenor.php" class="nav-link">
                                                <i class="far fa-user"></i>
                                                <p>Libro Caja Menor</p>
                                            </a>
                                    </li>
                                    <li class="nav-item">
                                            <a href="registro_fondorecambio.php" class="nav-link">
                                                <i class="far fa-user"></i>
                                                <p>Libro Fondo Recambio</p>
                                            </a>
                                    </li>
									 <li class="nav-item">
                                            <a href="registro_boleteria.php" class="nav-link">
                                                <i class="far fa-user"></i>
                                                <p>Libro Boleteria</p>
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


  

  