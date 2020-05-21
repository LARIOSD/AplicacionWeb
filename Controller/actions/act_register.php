<?php

require_once(__DIR__ . "/../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../Model/entities/Usuario.php");

$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];


if (!empty($_POST['correo']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
    if (($_POST['password'] == $_POST['confirm_password'])) {

        $usuario = new Usuario(
            null,
            $nombre,
            $username,
            $password,
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
