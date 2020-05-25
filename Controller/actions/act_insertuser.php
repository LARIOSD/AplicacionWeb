<?php

require_once (__DIR__."/../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../Model/entities/Usuario.php");

$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];
$telefono = $_POST['telefono']; 
$direccion = $_POST['direccion'];
if (isset($_FILES["Imagen"]) && $_FILES["Imagen"]=="TRUE"){
    echo "ok";
}
    




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
 //   header("Location: ../../view/admin/crud_usuario.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
}else{
   // header("Location: ../../view/login.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>