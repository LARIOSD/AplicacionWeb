<?php

require_once (__DIR__."/../../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../../Model/entities/Usuario.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$username = $_POST['correo'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

//if(isset($_FILES['Imagen'])){
//    $imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
//}
if (is_uploaded_file($_FILES["Imagen"]["tmp_name"])){
    $imagen =  file_get_contents($_FILES["Imagen"]["tmp_name"]);
}

$usuario = new Usuario(
        $id,
        $nombre,
        $username,
        $password,
        $imagen,
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