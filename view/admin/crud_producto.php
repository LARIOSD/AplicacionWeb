<?php
session_start();
if ($_SESSION['ID_TIPO'] == 2) {
    header("Location:../usuario/usuario.php");
} else if ($_SESSION['ID_TIPO'] != 1) {
    header("Location:../login.php");
}
require_once(__DIR__ . "/../../Controller/mdb/mdbProducto.php");
require_once(__DIR__ . "/../../Model/entities/producto.php");
$producto = leerProducto();
?>

<!DOCTYPE html>
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
    <link href="../plantilla/css/style_producto.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert.js"></script>


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
            <li class="nav-item">
                <a class="nav-link" href="crud_usuario.php">
                    <i class="fas fa-user"></i>
                    <span>Usuarios</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="crud_producto.php">
                    <i class="fas fa-shopping-basket"></i>
                    <span>Productos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item ">
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

                        <!--Tabla de productos-->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h4 class="m-0 font-weight-bold text-primary">Tabla de productos</h4>
                                <!--Boton crear producto -->
                                <div class="text-right">
                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#agregar_producto">
                                        <i class="fas fa-plus-circle"></i>
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
                                                <th class="th-sm">Nombre
                                                </th>
                                                <th class="th-sm">Descripcion
                                                </th>
                                                <th class="th-sm">Imagen
                                                </th>
                                                <th class="th-sm">Cantidad
                                                </th>
                                                <th class="th-sm">Precio x U/D
                                                </th>
                                                <th class="th-sm">Estado
                                                </th>
                                                <th class="th-sm">Tipo producto
                                                </th>
                                                <th class="th-sm">Edit
                                                </th>
                                                <th class="th-sm">Delete
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($producto as $aux) : ?>
                                                <tr>
                                                    <td> <?php echo $aux['idproducts']; ?></td>
                                                    <td> <?php echo $aux['nombre']; ?> </td>
                                                    <td> <?php echo $aux['descripcion']; ?> </td>
                                                    <td> <img width="100px" height="100px" src="data:image/JPG;base64,<?php echo base64_encode($aux['image']); ?>" class="foto2"> </td>
                                                    <td> <?php echo $aux['cantidad']; ?> </td>
                                                    <td> <?php echo $aux['precio']; ?> </td>
                                                    <td> <?php echo $aux['estado']; ?> </td>
                                                    <td> <?php echo $aux['idtipoproducts']; ?> </td>

                                                    <td>
                                                    <button href="" id="modificarProduct" pasarId="<?php echo $aux['id']; ?>" type="button" data-target="#modificar_producto" data-toggle="modal" class="btn btn-primary">
                                                    <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                    </td>

                                                    <td>
                                                        <form action="../../controller/actions/act_eliminarprod.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $aux['idproducts']; ?>">
                                                            <button id="eliminarProduct" type="submit" href="" class="btn btn-danger">
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


        <!--Crear producto modal-->
        <div class="modal fade" id="agregar_producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="crear" action="../../controller/actions/act_insertprod.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">

                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Agregar Producto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="columnas">

                            <div id="datos" class="modal-body mx-2" style="display: inline-block">

                                <!--Nombre-->
                                <div id="datosProductos" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fab fa-amilia"></i>
                                    </span>
                                    <input type="text" name="nombre" class="form-control validate" placeholder="Nombre" required>
                                </div>

                                <!--Descripcion-->
                                <div id="datosProductos" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-align-right"></i>
                                    </span>
                                    <input type="text" name="descripcion" class="form-control validate" placeholder="Descripcion" required>
                                </div>

                                <!--Precio-->
                                <div id="datosProductos" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </span>
                                    <input type="text" name="precio" class="form-control validate" placeholder="Precio" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>

                                <!--Cantidad-->
                                <div id="datosProductos" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-shopping-cart"></i>
                                    </span>
                                    <input type="text" name="cantidad" class="form-control validate" placeholder="Cantidad" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                </div>

                                <!--Tipo-->
                                <br>
                                <div id="datosProductos" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-apple-alt"></i>
                                    </span>
                                    <select name="idtipoproducts" class="form-control" id="exampleFormControlSelect1">
                                        <option value="1">Fruta</option>
                                        <option value="2">Verdura</option>
                                        <option value="3">Lacteo</option>
                                    </select>
                                </div>

                                <!--Estado-->
                                <br>
                                <div id="datosProductos" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-apple-alt"></i>
                                    </span>
                                    <select name="estado" class="form-control" id="exampleFormControlSelect1">
                                        <option value="1">si</option>
                                        <option value="2">no</option>

                                    </select>
                                </div>

                                <div id="image" class="modal-body mx-2" style="text-align:center">
                                    <!--Imagen-->
                                    <div class="vistaPrevia">
                                        <img id="img" src="../image/producto.jpg" alt="TU imagen">
                                    </div>
                                    <!--Imagen-->
                                    <div class="btn btn-success btn-icon-split">
                                        <input id="subirImg" type="file" name="image">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button form="crear" type="submit" value="Enviar" class="btn btn-success">Agregar</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!--fin crear producto modal-->

        <!--Modificar producto modal-->
        <div class="modal fade" id="modificar_producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="modificar" action="../../controller/actions/act_moduprod.php " method="POST">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Modificar Producto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="text" name="nombre" id="orangeForm-name" class="form-control validate" placeholder="User Name">
                            </div>
                            <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="email" name="correo" id="orangeForm-email" class="form-control validate" placeholder="Email">
                            </div>

                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix grey-text"></i>
                                <input type="password" name="password" id="orangeForm-pass" class="form-control validate" placeholder="Password">
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button form="modificar" type="submit" value="Enviar" class="btn btn-primary">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--fin Modificar producto modal -->

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
                        <a class="btn btn-primary" href="../../Controller/actions/act_logout.php">Logout</a>
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

        <script src="vista.js"></script>

</body>

</html>