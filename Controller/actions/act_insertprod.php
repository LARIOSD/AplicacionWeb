<?php
session_start();
require_once (__DIR__."/../mdb/mdbProducto.php");
require_once(__DIR__ . "/../../Model/entities/Producto.php");

$nombre_producto = $_POST["nombre"];
$descripcion_producto = $_POST["descripcion"];
if(isset($_FILES['image'])){
    $imagen_producto = addslashes(file_get_contents($_FILES['image']['tmp_name']));
}
$cantidad_producto = $_POST["cantidad"];
$precio_producto = $_POST["precio"];
$estado_producto = $_POST["estado"];
//$imagen_producto = $_POST["image"];
$idtipo_producto = $_POST["idtipoproducts"];




$producto = new Producto(
        null,
        $nombre_producto,
        $descripcion_producto,
        $imagen_producto,
        $cantidad_producto,
        $precio_producto,
        $estado_producto,
        $idtipo_producto,

    );

$respuesta = insertarProducto($producto);
if($respuesta!=null){
    echo "error 1";
    header("Location: ../../view/admin/crud_producto.php"); // ENVIAR AL HOMEPAGES DEL producto$producto
}else{
    header("Location: ../../view/login.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>