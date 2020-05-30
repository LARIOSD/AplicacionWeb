<?php
session_start();
require_once (__DIR__."/../mdb/mdbProducto.php");
require_once(__DIR__ . "/../../Model/entities/Producto.php");

$nombre_producto = $_POST["nombre"];
$estado_producto = $_POST["estado"];
$descripcion_producto = $_POST["descripcion"];
$precio_producto = $_POST["precio"];
$cantidad_producto = $_POST["cantidad"];
//$imagen_producto = $_POST["image"];
$idtipo_producto = $_POST["idtipoproducts"];

if(isset($_FILES['image'])){
    $imagen_producto = addslashes(file_get_contents($_FILES['image']['tmp_name']));
}


$producto = new Producto(
        null,
        $nombre_producto,
        $estado_producto,
        $descripcion_producto,
        $precio_producto,
        $cantidad_producto,
        $imagen_producto,
        $idtipo_producto,

    );

$respuesta = insertarProducto($producto);
if($respuesta!=null){
    echo "error 1";
    //header("Location: ../../view/admin/crud_producto.php"); // ENVIAR AL HOMEPAGES DEL producto$producto
}else{
    echo "estado = " + $estado_producto;

    
    
    //header("Location: ../../view/login.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>