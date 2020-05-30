<?php
session_start();
if(isset($_SESSION['ID_TIPO'])){
  if($_SESSION['ID_TIPO']==2){
    header("Location:../view/store/index.php");
  }else if($_SESSION['ID_TIPO']==1){
    header("Location:../view/admin/crud_usuario.php");
  }
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
  <link href="plantilla/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="plantilla/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="js/sweetalert.js"></script>

</head>

<body class="bg-gradient-primary">
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
              <form class="user" action="../controller/actions/act_register.php" method="POST">
                <div class="form-group">
                  <!--<div class="col-sm-6 mb-3 mb-sm-0">-->
                  <input type="text" class="form-control form-control-user" name="nombre" id="exampleFirstName" placeholder="User Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="correo" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <!-- --><div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="confirm_password" id="exampleRepeatPassword" placeholder="Repeat Password">
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
                <a class="small" href="forgot-password.html">Forgot Password?</a>
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
  <script src="plantilla/vendor/jquery/jquery.min.js"></script>
  <script src="plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="plantilla/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="plantilla/js/sb-admin-2.min.js"></script>



  <script>
    $(document).on("submit", "#formrg", function(e) {
      e.preventDefault();
      jQuery.ajax({
        url: '../Controller/actions/act_register.php',
        type: 'POST',
        dataType: 'json',
        data: $("#formrg").serialize(),
        beforeSend: function() {}}).done(function(respuesta) {
        if (!respuesta.existe) {
          if (!respuesta.error) {
            Swal.fire({
              type: 'sucess',
              title: '¡Correcto!',
              text: 'Se ha registrado correctamente',
              timer: 2000
            })
            setTimeout(function() {
            window.location.href = "register.php";
            }, 2500);
          }else{
            Swal.fire({
              type: 'error',
              title: '¡ERROR!',
              text: 'Ocurrió un error al registrarse',
              timer: 1500
            })
          }
        }else{
          Swal.fire({
            type: 'error',
            title: '¡ERROR!',
            text: 'El usuario ya existe, por favor ingrese un correo diferente.',
            timer: 1500
          })
        }
      }).fail(function(respuesta){
          document.write(respuesta.responseText);
        }).always(function() {
      });
  });
  </script>
</body>

</html>