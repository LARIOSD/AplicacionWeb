<?php

require_once (__DIR__."/../../mdb/mdbUsuario.php");

$id = $_POST['id'];

$respuesta = borrarUsuario($id);

if($respuesta!=null){
    header("Location:../../../view/admin/crud_usuario.php?id=0"); // ENVIAR AL HOMEPAGES DEL USUARIO      
}else{
    header("Location:../../../view/admin/crud_usuario.php?=-1"); //ENVIAR AL LOGIN NUEVAMENTE
}

