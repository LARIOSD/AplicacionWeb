<?php

require_once(__DIR__ . "/../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../Model/entities/Usuario.php");

$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];
$image = $_POST['image'];
$tipo = $_POST['tipo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];


if (!empty($_POST['correo']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
    if (($_POST['password'] == $_POST['confirm_password'])) {

        $usuario = new Usuario(
            null,
            $nombre,
            $username,
            $password,
            null,
            $tipo,
            $telefono,
            $direccion,
        );

        $respuesta = insertarUsuario($usuario);
    }
}


if ($respuesta != null) {
    header("Location: ../../view/login.php"); // ENVIAR AL LOGIN DE USUARIO
} else {
    echo ("Error");
    header("Location: ../../view/register.php"); //ENVIAR AL REGISTER NUEVAMENTE
}
