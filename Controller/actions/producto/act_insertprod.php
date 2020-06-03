<?php
session_start();
require_once (__DIR__."/../../mdb/mdbProducto.php");
require_once(__DIR__ . "/../../../Model/entities/Producto.php");

$nombre_producto = $_POST["nombre"];
$descripcion_producto = $_POST["descripcion"];

if(isset($_FILES['image'])){
    $imagen_producto = addslashes(file_get_contents($_FILES['image']['tmp_name']));
}
$cantidad_producto = $_POST["cantidad"];
$precio_producto = $_POST["precio"];
$estado_producto = 1;
$idtipo_producto = $_POST["idtipoproducts"];

$producto = leerProducto();
$estado = 0;
foreach ($producto as $aux) :
    if($nombre_producto === $aux['nombre']){
        $estado = 1;
    }
endforeach;


if($estado === 1){
    header("Location:../../../view/admin/crud_producto.php?id=1");//NO SE PUDO REGISTRAR EL producto PORQUE YA EXISTE
    //echo json_encode(array('existe' => true));
}else{
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
    header("Location:../../../view/admin/crud_producto.php?id=2"); // ENVIAR AL HOMEPAGES DEL producto$producto
}else{
    header("Location:../../../view/admin/crud_producto.php?id=3"); //ENVIAR AL LOGIN NUEVAMENTE
}
}

?>