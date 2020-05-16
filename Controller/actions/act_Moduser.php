<?php

require_once (__DIR__."/../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../Model/entities/Usuario.php");

$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];
$id = $_POST['id'];

$usuario = new Usuario(
        null,
        $nombre,
        $username,
        $password,
    );

$respuesta = modificarUsuario($usuario,$id);

if($respuesta!=null){
    header("Location: ../../view/admin/crud_usuario.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
}else{
    echo("Usuario no modificado");
    //header("Location: ../../view/login/login.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>