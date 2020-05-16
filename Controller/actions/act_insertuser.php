<?php

require_once (__DIR__."/../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../Model/entities/Usuario.php");

$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];


$usuario = new Usuario(
        null,
        $nombre,
        $username,
        $password,
    );

$respuesta = insertarUsuario($usuario);
if($respuesta!=null){
    header("Location: ../../view/admin/crud_usuario.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
}else{
    header("Location: ../../view/login.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>