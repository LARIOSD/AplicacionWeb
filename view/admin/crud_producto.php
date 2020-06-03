<?php
session_start();
if ($_SESSION['ID_TIPO'] == 2) {
    header("Location:../store/index.php");
} else if ($_SESSION['ID_TIPO'] != 1) {
    header("Location:../login.php");
}


require_once(__DIR__ . "/../../Controller/mdb/mdbProducto.php");
require_once(__DIR__ . "/../../Model/entities/producto.php");
$producto = leerProducto();


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

    <title>Administrador - Productos</title>
    <!-- http://localhost/AplicacionWeb/view/admin/crud_usuario.php -->

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Modificaciones adicionales-->
    <link href="css/style_producto.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/sweetalert.js"></script>


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

<?php
$lacteo = 0; $verduras = 0; $frutas = 0; $total = 0;
$prod = array();

foreach ($producto as $aux) :
    $total += 1;    
    if( 1 == $aux['idtipoproducts']){
        $lacteo += 1;
    }elseif (2 == $aux['idtipoproducts'] ) {
        $verduras +=1;
    }else{
        $frutas += 1;
    }
endforeach;

function procentaje($tipo,$total)
{
    $valorPorcentaje = ($tipo / $total)*100;

    return $valorPorcentaje;
}

array_push($prod,procentaje($lacteo,$total));
array_push($prod,procentaje($verduras,$total));
array_push($prod,procentaje($frutas,$total));
?>

<div id='tipo_0' class='producto' data-producto='<?php echo $total ?>'> </div>
<div id='tipo_1' class='producto' data-producto='<?php echo $prod[0]; ?>'> </div>
<div id='tipo_2' class='producto' data-producto='<?php echo $prod[1]; ?>'> </div>
<div id='tipo_3' class='producto' data-producto='<?php echo $prod[2]; ?>'> </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!--Inicio row -->
                    <div class="row">
                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafica de productos</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    Porcentaje de productos existentes por tipo.
                                    <br>
                                    Frutas, Lacteos y Verduras.
                                </div>
                            </div>
                        </div>
                        
                        <!--Inicio columnas grafica-->
                        <div class="col-xl-8 col-lg-7">

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafica de barras</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
                                </div>
                            </div>
                        
                        </div>
                        <!--Fin columnas grafica -->
                    </div>
                    <!--Fin row -->

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
                                                <td> <img width="100px" height="100px" src="data:image/jpg;base64,<?php echo base64_encode($aux['image']); ?>" class="foto2"> </td>
                                                <td> <i class="fas fa-cubes"></i> <?php echo $aux['cantidad']; ?> </td>
                                                <td> <i class="fas fa-dollar-sign"></i> <?php echo $aux['precio']; ?> </td>
                                                <td> <?php if (1== $aux['estado']){
                                                                echo "Disponible";
                                                            }else {
                                                                echo "Agotado";
                                                                }
                                                        ?> 
                                                </td>
                                                <td> <?php if (1 == $aux['idtipoproducts']) {
                                                                echo "Lacteo";
                                                            }elseif (2 == $aux['idtipoproducts']){
                                                                echo "Verdura";
                                                            }else {
                                                                echo "Fruta";
                                                            }
                                                        ?>
                                                <td>
                                                    <button href="" id="modificarProduct" pasarId="<?php echo $aux['id']; ?>" type="button" data-target="#modificar_producto" data-toggle="modal" class="btn btn-primary">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                </td>

                                                <td>
                                                    <form action="../../controller/actions/producto/act_eliminarprod.php" method="POST">
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
            <form id="crear" action="../../controller/actions/producto/act_insertprod.php" method="POST" enctype="multipart/form-data">
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
                                <input type="number" name="precio" class="form-control validate" placeholder="Precio" min="100" required>
                            </div>

                            <!--Cantidad-->
                            <div id="datosProductos" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                                <input type="number" name="cantidad" class="form-control validate" placeholder="Cantidad" min="1" required>
                            </div>

                            <!--Tipo-->
                            <br>
                            <div id="datosProductos" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-apple-alt"></i>
                                </span>
                                <select name="idtipoproducts" class="form-control">
                                    <option value="3">Fruta</option>
                                    <option value="2">Verdura</option>
                                    <option value="1">Lacteo</option>
                                </select>
                            </div>
                        </div>

                        <div id="image" class="modal-body mx-2" style="text-align:center">
                            <!--Imagen-->
                            <div class="vistaPrevia">
                                <img id="img" src="img/producto.jpg" alt="TU imagen">
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
            <form id="modificar" action="../../controller/actions/producto/act_modprod.php " method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Modificar Producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="columnas">

                        <div id="datos" class="modal-body mx-2" style="display: inline-block">

                            <!--Id-->
                            <div id="datosProductos" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-fingerprint"></i>
                                </span>
                                <input type="text" name="id" class="form-control validate" placeholder="ID" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>

                            <!--Nombre-->
                            <div id="datosProductos" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fab fa-amilia"></i>
                                </span>
                                <input type="text" name="nombre" class="form-control validate" placeholder="Nombre" required>
                            </div>

                            <!--Descripcion-->
                            <div id="datosProductos" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-align-right"></i>
                                </span>
                                <input type="text" name="descripcion" class="form-control validate" placeholder="Descripcion" required>
                            </div>

                            <!--Precio-->
                            <div id="datosProductos" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </span>
                                <input type="number" name="precio" class="form-control validate" placeholder="Precio" min="100" required>
                            </div>

                            <!--Cantidad-->
                            <div id="datosProductos" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                                <input type="number" name="cantidad" class="form-control validate" placeholder="Cantidad" min="1" required>
                            </div>

                            <!--Tipo-->
                            <br>
                            <div id="datosProductos" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-apple-alt"></i>
                                </span>
                                <select name="idtipoproducts" class="form-control">
                                    <option value="1">Fruta</option>
                                    <option value="2">Verdura</option>
                                    <option value="3">Lacteo</option>
                                </select>
                            </div>
                        </div>

                        <div id="image" class="modal-body mx-2" style="text-align:center">
                            <!--Imagen-->
                            <div class="vistaPrevia">
                                <img id="imga" src="img/producto.jpg" alt="TU imagen">
                            </div>
                            <!--Imagen-->
                            <div class="btn btn-primary btn-icon-split">
                                <input id="subirImga" type="file" name="image">
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
    <!--fin Modificar producto modal -->

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
                    <a class="btn btn-primary" href="../../Controller/actions/login/act_logout.php">Logout</a>
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

    <!--vista Previa de imagenes-->
    <script src="js/vista_image_crearUser.js"></script>
    <script src="js/vista_image_modUser.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/sweetalert2.js"></script>
</body>

</html>

