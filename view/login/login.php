<?php
session_start();
if(isset($_SESSION['ID_TIPO'])){
  if($_SESSION['ID_TIPO']==2){
    header("Location:../store/index.php");
  }else if($_SESSION['ID_TIPO']==1){
    header("Location:../admin/crud_usuario.php");
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

  <meta name="google-signin-client_id" content="proyect-web-store">

  <title>Login</title>

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

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  
                  <form class="user" action="../../controller/actions/login/act_login.php" method="POST" >
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="correo" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Manera de acceso</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="opcion">
                      <option value="1">Administrador</option>
                      <option value="2">Usuario</option>
                    </select>

                    <div class="form-group" style="margin: 10px">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                    <hr>
                    <a class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
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

  <!--Google login-->
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert_login.js"></script>

</body>

</html>
