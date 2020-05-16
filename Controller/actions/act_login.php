<?php
        session_start();
        require_once (__DIR__."/../mdb/mdbUsuario.php");
        $home = "..";
	
        $errMsg =   'OK';
		$username = $_POST['correo'];
		$password = $_POST['password'];
        
        $user = autenticarUsuario($username, $password);
		if($user != null){
                    $_SESSION['ID_USUARIO'] = $user->getId();
                    $_SESSION['NOMBRE_USUARIO'] = $user->getNombre();
                    header("Location: ../../view/admin/crud_usuario.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
		}else{
                    $errMsg .= 'Correo y/o contraseña no válido';
                    echo $errMsg;
                    header("Location: ../../view/login.php"); //ENVIAR AL LOGIN NUEVAMENTE
		}
