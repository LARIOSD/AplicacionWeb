<?php
session_start();
require_once (__DIR__."/../../mdb/mdbproducto.php");
require_once(__DIR__ . "/../../../model/entities/producto.php");

$id = $_POST['id'];
$nombre_producto = $_POST["nombre"];
$descripcion_producto = $_POST["descripcion"];
$cantidad_producto = $_POST["cantidad"];
$precio_producto = $_POST["precio"];
$estado_producto = 1;
$idtipo_producto = $_POST["idtipoproducts"];

//if(isset($_FILES['image'])){
  //  $imagen_producto = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//}
if (is_uploaded_file($_FILES["image"]["tmp_name"])){
    $imagen_producto =  file_get_contents($_FILES["image"]["tmp_name"]);
}



$producto = new Producto(
        $id,
        $nombre_producto,
        $descripcion_producto,
        $imagen_producto,
        $cantidad_producto,
        $precio_producto,
        $estado_producto,
        $idtipo_producto

    );

$respuesta = modificarProducto($producto,$id);
if($respuesta!=null){
    echo "error 1";
    header("Location:../../../view/admin/crud_producto.php?id=4"); // ENVIAR AL HOMEPAGES DEL producto$producto
}else{
    echo "error 2";
    header("Location:../../../view/admin/crud_producto.php?id=5"); //ENVIAR AL LOGIN NUEVAMENTE
}

?>