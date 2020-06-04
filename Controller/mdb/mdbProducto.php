<?php

function buscarProductoPorId($id)
{
    require_once(__DIR__ . "/../../model/dao/productodao.php");
    $dao = new ProductoDAO();
    $producto = $dao->buscarProductoPorId($id);
    return $producto;
}

function insertarProducto($producto)
{
    require_once(__DIR__ . "/../../model/dao/productodao.php");
    $dao = new ProductoDAO();
    $resultado = $dao->insertarProducto($producto);
    return $resultado;
}

function modificarProducto($producto,$id)
{
    require_once(__DIR__ . "/../../model/dao/productodao.php");
    $dao = new ProductoDAO();
    $resultado = $dao->modificarProducto($producto,$id);
    return $resultado;
}

function borrarProducto($id)
{
    require_once(__DIR__ . "/../../model/dao/productodao.php");
    $dao = new ProductoDAO();
    $resultado = $dao->borrarProducto($id);
    return $resultado;
}

function leerProducto(){
    require_once(__DIR__ . "/../../model/dao/productodao.php");
    $dao = new ProductoDAO();
    $resultado = $dao->leerProducto();
    return $resultado;
}