<!DOCTYPE html>

<?php

session_start();
require_once(__DIR__ . "/../../Controller/mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../Model/entities/Usuario.php");
require_once(__DIR__ . "/../../Model/dao/DataSource.php");

$usuario = leerUsuarios();
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador </title>
    <!-- http://localhost/AplicacionWeb/view/admin/crud_usuario.php -->
    <!-- Custom fonts for this template-->
    <link href="../plantilla/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../plantilla/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Modificaciones adicionales-->
    <link href="../plantilla/css/style.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="crud_usuario.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Panel de control</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="crud_usuario.php">
                    <i class="fas fa-user"></i>
                    <span>Usuarios</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="crud_producto.php">
                    <i class="fas fa-shopping-basket"></i>
                    <span>Productos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Otros</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - Logout -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="container">
                        <!--
                        <form action="../../controller/actions/act_Moduser.php" method="POST">
                            <h2 class="nombre_accion">Modificar resu$resultado</h2>
                            <div class="modificar">
                                <input type="text" name="id" class="form-control" placeholder="id" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                <button type="submit" value="Enviar" class="btn btn-warning">Modificar</button>
                            </div>
                        </form>

                        <form action="../../controller/actions/act_Elimuser.php" method="POST">
                            <h2 class="nombre_accion">Eliminar resu$resultado</h2>
                            <div class="eliminar">
                                <input type="text" name="id" class="form-control" placeholder="id" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                <button type="submit" value="Enviar" class="btn btn-danger">Eliminar</button>
                            </div>
                        </form>
-->
                        <!--Tabla de usuarios-->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h4 class="m-0 font-weight-bold text-primary">Tabla de usuarios</h4>

                                <!--Boton crear resu$resultado -->
                                <div class="text-right">
                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#Crear_usuario">
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="th-sm">ID
                                                </th>
                                                <th class="th-sm">Name
                                                </th>
                                                <th class="th-sm">Email
                                                </th>
                                                <th class="th-sm">Edit
                                                </th>
                                                <th class="th-sm">Delete
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while( $resultado = $usuario->mysqli_fetch_assoc($usuario)): //foreach ($resultado as $resultado) :  ?>
                                                <tr>
                                                    <td> <?php echo $resultado['id']; ?></td>
                                                    <td> <?php echo $resultado['nombre']; ?> </td>
                                                    <td> <?php echo $resultado['correo']; ?> </td>
                                                    <td>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
                                                            <input type="hidden" name="nombre" value="<?php echo $resultado['nombre']; ?>">
                                                            <input type="hidden" name="correo" value="<?php echo $resultado['correo']; ?>">

                                                            <button href="" onclick="" data-target="#modificar_usuario" data-toggle="modal" class="btn btn-primary">
                                                                <i class="fas fa-user-edit"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">

                                                            <button type="button" href="" data-target="#eliminar_usuario" data-toggle="modal" class="btn btn-danger">
                                                                <i class="fas fa-user-minus"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endwhile; //ndforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID
                                                </th>
                                                <th>Name
                                                </th>
                                                <th>Email
                                                </th>
                                                <th>Edit
                                                </th>
                                                <th>Delete
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2019</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!--Crear resu$resultado modal-->
        <div class="modal fade" id="Crear_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="crear" action="../../controller/actions/act_insertuser.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Crear resu$resultado</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3" style="text-align:center">

                            <!--Nombre-->
                            <div class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" name="nombre" class="form-control validate" placeholder="Nombre">
                            </div>
                            <!--Correo-->
                            <div class="btn btn-primary btn-icon-split" style="margin: 10px">
                                <span class="icon text-white-50">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                </span>
                                <input type="email" name="correo" class="form-control validate" placeholder="Email">
                            </div>
                            <!--Password-->
                            <div class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control validate" placeholder="Password">
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button form="crear" type="submit" value="Enviar" class="btn btn-success">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--fin crear resu$resultado modal-->

        <!--Modificar resu$resultado modal-->
        <div class="modal fade" id="modificar_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="modificar" action="../../controller/actions/act_Moduser.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Modificar resu$resultado</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3" style="text-align:center">

                            <!--Id-->
                            <input type="hidden" name="id">

                            <!--Nombre-->
                            <div class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" name="nombre" class="form-control validate" value="<?php echo $resultado['nombre']; ?>" placeholder="Nombre">
                            </div>
                            <!--Correo-->
                            <div class="btn btn-primary btn-icon-split" style="margin: 10px">
                                <span class="icon text-white-50">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                </span>
                                <input type="email" name="correo" class="form-control validate" placeholder="Email">
                            </div>
                            <!--Password-->
                            <div class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control validate" placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button form="modificar" type="submit" value="Enviar" class="btn btn-primary">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--fin Modificar resu$resultado modal -->

        <!-- Delete Modal-->
        <div class="modal fade" id="eliminar_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="eliminar" action="../../controller/actions/act_Elimuser.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Selecciono eliminar. ¿ Esta seguro de eliminar este resu$resultado ?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button form="eliminar" type="submit" class="btn btn-danger" href=""> <i class="fas fa-trash"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button action="../../controller/actions/act_logout.php" class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../plantilla/vendor/jquery/jquery.min.js"></script>
        <script src="../plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../plantilla/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../plantilla/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../plantilla/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../plantilla/js/demo/chart-area-demo.js"></script>
        <script src="../plantilla/js/demo/chart-pie-demo.js"></script>

</body>

</html>