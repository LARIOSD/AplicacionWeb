<?php
session_start();
if ($_SESSION['ID_TIPO'] == 2) {
    header("Location:../store/index.php");
} else if ($_SESSION['ID_TIPO'] != 1) {
    header("Location:../login/login.php");
}


require_once(__DIR__ . "/../../controller/mdb/mdbusuario.php");
require_once(__DIR__ . "/../../model/entities/usuario.php");

$usuario = leerUsuarios();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo "<script>console.log($id);</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador - Usuarios</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="img/fruit.png" />


    <!-- Modificaciones adicionales-->
    <link href="css/style_usuario.css" rel="stylesheet">

</head>


<body id="page-top">
    
<div id='val' class='estado' data-estado='<?php echo $id ?>'> </div>
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

                    <!--Tabla de usuarios-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Tabla de usuarios</h4>

                            <!--Boton crear Usuario -->
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
                                            <th class="th-sm">Foto
                                            </th>
                                            <th class="th-sm">Name
                                            </th>
                                            <th class="th-sm">Email
                                            </th>
                                            <th class="th-sm">Tipo
                                            </th>
                                            <th class="th-sm">Edit
                                            </th>
                                            <th class="th-sm">Delete
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($usuario as $aux) :  ?>
                                            <tr>
                                                <td> <?php echo $aux['id']; ?></td>
                                                <td> <img width="100px" height="100px" src="data:image/JPG;base64,<?php echo base64_encode($aux['imagen']); ?>" class="foto2"> </td>
                                                <td> <?php echo $aux['nombre']; ?> </td>
                                                <td> <?php echo $aux['correo']; ?> </td>
                                                <td> <?php if (1 == $aux['tipo']){
                                                                echo "Administrador";
                                                            }else {
                                                                echo "Usuario";
                                                                }
                                                        ?> 
                                                </td>
                                                <td>
                                                    <button href="" id="modificarUser" onclick="capIdusuario(<?php echo $aux['id'];?>)" type="button" data-target="#modificar_usuario" data-toggle="modal" class="btn btn-primary">
                                                        <i class="fas fa-user-edit"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <form action="../../controller/actions/usuario/act_elimuser.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $aux['id']; ?>">
                                                        <button id="eliminarUser" type="submit" href="" class="btn btn-danger">
                                                            <i class="fas fa-user-minus"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
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

    <!--Crear Usuario modal-->
    <div class="modal fade" id="Crear_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="crear" action="../../controller/actions/usuario/act_insertuser.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">

                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Crear Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="columnas">
                        <div id="datos" class="modal-body mx-2" style="display: inline-block">

                            <!--Nombre-->
                            <div id="datosUsuario" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" name="nombre" class="form-control validate" placeholder="Nombre" required>
                            </div>

                            <!--Correo-->
                            <div id="datosUsuario" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                </span>
                                <input type="email" name="correo" class="form-control validate" placeholder="Email" required>
                            </div>

                            <!--Telefono-->
                            <div id="datosUsuario" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="text" name="telefono" class="form-control validate" placeholder="Telefono" required>
                            </div>

                            <!--Direccion-->
                            <div id="datosUsuario" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-street-view"></i>
                                </span>
                                <input type="text" name="direccion" class="form-control validate" placeholder="Dirección" required>
                            </div>

                            <!--Tipo-->
                            <div id="datosUsuario" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-user"></i>
                                </span>
                                <select name="tipo" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuario</option>
                                </select>
                            </div>

                            <!--Password-->
                            <div id="datosUsuario" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control validate" placeholder="Password" required>
                            </div>
                        </div>

                        <div id="image" class="modal-body mx-2" style="text-align:center">
                            <!--Imagen-->
                            <div class="vistaPrevia">
                                <img id="img" src="img/image.png" alt="TU imagen">
                            </div>
                            <!--Imagen-->
                            <div class="btn btn-success btn-icon-split">
                                <input id="subirImg" type="file" name="Imagen">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button form="crear" type="submit" value="Enviar" class="btn btn-success">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--fin crear Usuario modal-->

    <!--Modificar Usuario modal-->
    <div class="modal fade" id="modificar_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="modificar" action="../../controller/actions/usuario/act_moduser.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Modificar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="columnas">
                        <div id="datos" class="modal-body mx-3" style="display: inline-block">

                            <!--Id-->
                            <div id="datosUsuario" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-fingerprint"></i>
                                </span>
                                <input id="id_mu" value="" type="text" name="id" class="form-control validate" placeholder="ID" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                            </div>

                            <!--Nombre-->
                            <div id="datosUsuario" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" name="nombre" class="form-control validate" placeholder="Nombre">
                            </div>

                            <!--Correo-->
                            <div id="datosUsuario" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                </span>
                                <input type="email" name="correo" class="form-control validate" placeholder="Email">
                            </div>

                            <!--Telefono-->
                            <div id="datosUsuario" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="text" name="telefono" class="form-control validate" placeholder="Telefono">
                            </div>

                            <!--Direccion-->
                            <div id="datosUsuario" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-street-view"></i>
                                </span>
                                <input type="text" name="direccion" class="form-control validate" placeholder="Dirección">
                            </div>

                            <!--Tipo-->
                            <div id="datosUsuario" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-user"></i>
                                </span>
                                <select name="tipo" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuario</option>
                                </select>
                            </div>

                            <!--Password-->
                            <div id="datosUsuario" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control validate" placeholder="Password">
                            </div>
                        </div>

                        <div id="image" class="modal-body mx-2" style="text-align:center">
                            <!--Imagen-->
                            <div class="vistaPrevia">
                                <img id="imga" src="img/image.png" alt="TU imagen">
                            </div>
                            <!--Imagen-->
                            <div class="btn btn-primary btn-icon-split">
                                <input id="subirImga" type="file" name="Imagen">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button form="modificar" type="submit" value="Enviar" class="btn btn-primary">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--fin Modificar Usuario modal -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button action="../../controller/actions/producto/act_logout.php" class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../controller/actions/login/act_logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!--SweetAlert2-->

    <!--vista Previa de imagenes-->
    <script src="js/vista_image_crear.js"></script>
    <script src="js/vista_image_mod.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/sweetalert.js"></script>
    
    <!--pasar el id al modal-->
    <script src="js/datosmod.js"></script>
</body>

</html>