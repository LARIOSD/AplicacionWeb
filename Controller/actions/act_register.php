<?php

require_once(__DIR__ . "/../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../Model/entities/Usuario.php");

$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

if (isset($_FILES['Imagen'])) {
    $imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
}

$usuarios = leerUsuarios();
$estado = 0;
foreach ($usuarios as $aux) :
    if ($username === $aux['correo']) {
        $estado = 1;
    }
endforeach;

if ($estado === 1) {
    header("Location: ../../view/admin/crud_usuario.php?id=0"); //NO SE PUDO REGISTRAR EL USUARIO PORQUE EL CORREO YA EXISTE
} else {
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
}


if ($respuesta != null) {
    header("Location: ../../view/login.php"); // ENVIAR AL LOGIN DE USUARIO
} else {
    echo ("Error");
    header("Location: ../../view/register.php"); //ENVIAR AL REGISTER NUEVAMENTE
}
