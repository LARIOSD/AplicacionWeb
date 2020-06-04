<?php
session_start();
if (isset($_SESSION['ID_TIPO'])) {
  if ($_SESSION['ID_TIPO'] == 2) {
    header("Location:../view/store/index.php");
  } else if ($_SESSION['ID_TIPO'] == 1) {
    header("Location:../view/admin/crud_usuario.php");
  }
}

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

  <title>Register</title>
  <!-- Custom fonts for this template-->
  <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="bg-gradient-primary">

<div id='val' class='estado' data-estado='<?php echo $id ?>'> </div>

  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="../../controller/actions/login/act_register.php" method="POST">
                <!--Nombre -->
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nombre" id="exampleFirstName" placeholder="User Name" required>
                </div>

                <div class="form-group row">
                <!--Telefono -->
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="tel" pattern="[3][0-2][0-9]-[0-9]{3}-[0-9]{4}" class="form-control form-control-user" name="telefono" id="exampleInputPassword" placeholder="Phone Number"  required>
                    <samp style="color:#e2d9e9" >Formato: 300-123-4567</samp>
                  </div>
                  <!--Direccion-->
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="direccion" id="exampleRepeatPassword" placeholder="Direction" required>
                  </div>
                </div>
                
                <!--Email -->
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="correo" id="exampleInputEmail" placeholder="Email Address" required>
                </div>

                <div class="form-group row">
                <!--Pass -->
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                  <!--Confirmar Pass -->
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="confirm_password" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                  </div>
                </div>

                <button href="" type="submit" class="btn btn-primary btn-user btn-block" value="send">
                  Register Account
                </button>
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../admin/vendor/jquery/jquery.min.js"></script>
  <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../admin/js/sb-admin-2.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert.js"></script>
</body>

</html>