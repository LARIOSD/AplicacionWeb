<?php

require_once (__DIR__."/../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../Model/entities/Usuario.php");

$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];
$image = $_POST['image'];
$tipo = $_POST['tipo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];


$usuario = new Usuario(
        null,
        $nombre,
        $username,
        $password,
        $image,
        $tipo,
        $telefono,
        $direccion,

    );

$respuesta = insertarUsuario($usuario);
if($respuesta!=null){
    header("Location: ../../view/admin/crud_usuario.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
}else{
    header("Location: ../../view/login.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>