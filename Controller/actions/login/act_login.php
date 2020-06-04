<?php
        session_start();
        require_once (__DIR__."/../../mdb/mdbusuario.php");
        $home = "..";
	
        $errMsg =   'OK';
		$username = $_POST['correo'];
        $password = $_POST['password'];
        $tipo = $_POST['opcion'];

        $user = autenticarUsuario($username, $password);
		if($user != null){
            $_SESSION['Tipo'] = $user->getTipo();
            $tipo2= $user->getTipo();
            if($tipo!= $tipo2){
                header("Location: ../../../view/login/login.php?id=1"); //ENVIAR AL LOGIN NUEVAMENTE tipo de acceso no valido
            }else{
                $_SESSION['ID_TIPO'] = $user->getTipo();
                $_SESSION['ID_USUARIO'] = $user->getId();
                $_SESSION['NOMBRE_USUARIO'] = $user->getNombre();
                if($tipo!=1){
                    header("Location: ../../../view/store/index.php"); // ENVIAR AL HOMEPAGES DEL ADMIN
                }else{
                    header("Location: ../../../view/admin/crud_usuario.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
                }
            }           
            
		}else{
            header("Location: ../../../view/login/login.php?id=2"); //ENVIAR AL LOGIN NUEVAMENTE correo o contraseña invalido
		}
?>