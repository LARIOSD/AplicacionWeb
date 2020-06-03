<?php

require_once (__DIR__."/../../mdb/mdbProducto.php");

$id = $_POST['id'];


$respuesta = borrarProducto($id);

if($respuesta!=null){
    header("Location: ../../../view/admin/crud_producto.php?id=0"); // ENVIAR AL HOMEPAGES DEL USUARIO     
}else{
    header("Location: ../../../view/admin/crud_producto.php?id=-1"); //ENVIAR AL LOGIN NUEVAMENTE
    echo "error"+ $id;
}