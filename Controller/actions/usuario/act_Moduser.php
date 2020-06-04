<?php

require_once (__DIR__."/../../mdb/mdbusuario.php");
require_once(__DIR__ . "/../../../model/entities/usuario.php");

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
    header("Location:../../../view/admin/crud_usuario.php?id=5"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>