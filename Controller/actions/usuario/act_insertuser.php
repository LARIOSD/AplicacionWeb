<?php

session_start();
require_once (__DIR__."/../../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../../Model/entities/Usuario.php");

$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];
$telefono = $_POST['telefono']; 
$direccion = $_POST['direccion'];

//if(isset($_FILES['Imagen'])){
//    $imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
//}

if (is_uploaded_file($_FILES["Imagen"]["tmp_name"]))
{
    $imagen =  file_get_contents($_FILES["Imagen"]["tmp_name"]);
    
}

$usuarios = leerUsuarios();
$estado = 0;
foreach ($usuarios as $aux) :
    if($username === $aux['correo']){
        $estado = 1;
    }
endforeach;

if($estado === 1){
    header("Location: ../../../view/admin/crud_usuario.php?id=1"); //NO SE PUDO REGISTRAR EL USUARIO PORQUE EL CORREO YA EXISTE
    //echo json_encode(array('existe' => true));
}else{
    $usuario = new Usuario(
        null,
        $nombre,
        $username,
        $password,
        $imagen,
        $tipo,
        $telefono,
        $direccion,

    );

    $respuesta = insertarUsuario($usuario);
    if($respuesta!=null){
        header("Location: ../../../view/admin/crud_usuario.php?id=2"); // SE CREO UN NUEVO USUARIO
       //echo json_encode(array('error' => false));
    }else{
        header("Location: ../../../view/admin/crud_usuario.php?id=3"); //NO SE PUEDO CREAR EL USUARIO
       //echo json_encode(array('error' => true));
    }
}

?>