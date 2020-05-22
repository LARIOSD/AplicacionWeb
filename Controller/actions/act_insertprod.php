<?php

require_once (__DIR__."/../mdb/mdbProducto.php");
require_once(__DIR__ . "/../../Model/entities/Producto.php");

$nombre_producto = $_POST["nombre_producto"];
$tipo_producto = $_POST["tipo_producto"];
$estado_producto = $_POST["estado_producto"];
$descripcion_producto = $_POST["descripcion_producto"];
$precio_producto = $_POST["precio_producto"];
$cantidad_producto = $_POST["cantidad_producto"];
$imagen_producto = $_POST["imagen_producto"];
$idtipo_producto = $_POST["idtipo_producto"];

$producto = new Producto(
        null,
        $nombre_producto,
        $tipo_producto,
        $estado_producto,
        $descripcion_producto,
        $precio_producto,
        $cantidad_producto,
        $imagen_producto,
        $idtipo_producto,

    );

$respuesta = insertarUsuario($producto);
if($respuesta!=null){
    header("Location: ../../view/admin/crud_producto.php"); // ENVIAR AL HOMEPAGES DEL producto$producto
}else{
    header("Location: ../../view/login.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>