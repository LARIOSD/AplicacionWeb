<?php

require_once (__DIR__."/../../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../../Model/entities/Usuario.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];

if(isset($_FILES['Imagen'])){
    $imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
}

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

$respuesta = modificarUsuario($usuario,$id);

if($respuesta!=null){
    header("Location:../../../view/admin/crud_usuario.php?id=4"); // ENVIAR AL HOMEPAGES DEL USUARIO
}else{
    echo("Usuario no modificado");
    header("Location:../../../view/admin/crud_usuario.php?id=5"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>