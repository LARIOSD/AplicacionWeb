<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entities/Producto.php");

class ProductoDAO
{
    public function buscarProductoPorId($id)
    {
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM products WHERE id = :id",
            array(':id' => $id)
        );
        $producto = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $producto = new Producto(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre_producto"],
                    $data_table[$indice]["tipo_producto"],
                    $data_table[$indice]["estado_producto"],
                    $data_table[$indice]["descripcion_producto"],
                    $data_table[$indice]["precio_producto"],
                    $data_table[$indice]["cantidad_producto"],
                    $data_table[$indice]["imagen_producto"],
                    $data_table[$indice]["idtipo_producto"],
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
                $data_table[$indice]["id"],
                $data_table[$indice]["nombre_producto"],
                $data_table[$indice]["tipo_producto"],
                $data_table[$indice]["estado_producto"],
                $data_table[$indice]["descripcion_producto"],
                $data_table[$indice]["precio_producto"],
                $data_table[$indice]["cantidad_producto"],
                $data_table[$indice]["imagen_producto"],
                $data_table[$indice]["idtipo_producto"],
            );
            array_push($productos, $producto);
        }
        return $data_table;
    }

    public function insertarProducto(Producto $producto)
    {
        $data_source = new DataSource();
        $sql = "INSERT INTO products VALUES (:id, :nombre_producto, :tipo_producto, :estado_producto, :descripcion_producto, :precio_producto, :cantidad_producto, :imagen_producto )";
        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':id' => $producto->getId(),
                ':nombre_producto' => $producto->getNombre_producto(),
                ':tipo_producto' => $producto->getTipo_producto(),
                ':estado_producto' => $producto->getEstado_producto(),
                ':descripcion_producto' => $producto->getDescripcion_producto(),
                ':precio_producto' => $producto->getPrecio_producto(),
                ':cantidad_producto' => $producto->getCantidad_producto(),
                ':imagen_producto' => $producto->getImagen_producto(),
                ':idtipo_producto' => $producto->getIdtipo_producto(),

            )
        );

        return $resultado;
    }


    public function modificarProducto(Producto $producto, $id)
    {
        $data_source = new DataSource();
        $sql = "UPDATE products SET nombre_producto= :nombre_producto, tipo_producto= :tipo_producto, estado_producto= :estado_producto, descripcion_producto= :descripcion_producto, 
        precio_producto= :precio_producto, cantidad_producto= :cantidad_producto, imagen_producto= :imagen_producto, idtipo_producto= :idtipo_producto where id = $id";

        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':id' => $producto->getId(),
                ':nombre_producto' => $producto->getNombre_producto(),
                ':tipo_producto' => $producto->getTipo_producto(),
                ':estado_producto' => $producto->getEstado_producto(),
                ':descripcion_producto' => $producto->getDescripcion_producto(),
                ':precio_producto' => $producto->getPrecio_producto(),
                ':cantidad_producto' => $producto->getCantidad_producto(),
                ':imagen_producto' => $producto->getImagen_producto(),
                ':idtipo_producto' => $producto->getIdtipo_producto(),
            )
        );

        return $resultado;
    }

    public function borrarProducto($id)
    {
        $data_source = new DataSource();
        $producto = buscarUsuarioPorId($id);
        $resultado = $data_source->ejecutarActualizacion("DELETE FROM products WHERE id = :id", array('id' => $id));

        return $resultado;
    }
}
