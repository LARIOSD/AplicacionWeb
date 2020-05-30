<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entities/Producto.php");

class ProductoDAO
{
    public function buscarProductoPorId($idproducts)
    {
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM products WHERE idproducts = :idproducts",
            array(':idproducts' => $idproducts)
        );
        $producto = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $producto = new Producto(
                    $data_table[$indice]["idproducts"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["estado"],
                    $data_table[$indice]["descripcion"],
                    $data_table[$indice]["image"],
                    $data_table[$indice]["cantidad"],
                    $data_table[$indice]["precio"],
                    $data_table[$indice]["estado"],
                    $data_table[$indice]["idtipoproducts"],
                );
            }
            return $producto;
        } else {
            return null;
        }
    }

    public function leerProducto()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM products");
        $producto = null;
        $productos = array();
        foreach ($data_table as $indice => $valor) {
            $producto = new Producto(
                $data_table[$indice]["idproducts"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["estado"],
                $data_table[$indice]["descripcion"],
                $data_table[$indice]["image"],
                $data_table[$indice]["cantidad"],
                $data_table[$indice]["precio"],
                $data_table[$indice]["estado"],
                $data_table[$indice]["idtipoproducts"],
            );
            array_push($productos, $producto);
        }
        return $data_table;
    }

    public function insertarProducto(Producto $producto)
    {
        $data_source = new DataSource();
        $sql = "INSERT INTO products VALUES (:idproducts, :nombre, :descripcion, :image, :cantidad, :precio, :estado, :idtipoproducts)";
        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':idproducts' => $producto->getId(),
                ':nombre' => $producto->getNombre_producto(),
                ':estado' => $producto->getEstado_producto(),
                ':descripcion' => $producto->getDescripcion_producto(),
                ':precio' => $producto->getPrecio_producto(),
                ':cantidad' => $producto->getCantidad_producto(),
                ':image' => $producto->getImagen_producto(),
                ':idtipoproducts' => $producto->getIdtipo_producto(),

            )
        );

        return $resultado;
    }


    public function modificarProducto(Producto $producto, $idproducts)
    {
        $data_source = new DataSource();
        $sql = "UPDATE products SET nombre= :nombre, estado= :estado, descripcion= :descripcion, 
        precio= :precio, cantidad= :cantidad, image= :image, idtipoproducts= :idtipoproducts where idproducts = $idproducts";

        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':idproducts' => $producto->getId(),
                ':nombre' => $producto->getNombre_producto(),
                ':estado' => $producto->getEstado_producto(),
                ':descripcion' => $producto->getDescripcion_producto(),
                ':precio' => $producto->getPrecio_producto(),
                ':cantidad' => $producto->getCantidad_producto(),
                ':image' => $producto->getImagen_producto(),
                ':idtipoproducts' => $producto->getIdtipo_producto(),
            )
        );

        return $resultado;
    }

    public function borrarProducto($id)
    {
        $data_source = new DataSource();
        $producto = buscarProductoPorId($id);
        $resultado = $data_source->ejecutarActualizacion("DELETE FROM products WHERE idproducts = :idproducts", array('idproducts' => $id));

        return $resultado;
    }
}
