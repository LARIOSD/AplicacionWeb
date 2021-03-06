<?php

class Producto
{
    private $id;
    private $nombre_producto;
    private $descripcion_producto;
    private $imagen_producto;
    private $cantidad_producto;
    private $precio_producto;
    private $estado_producto;
    private $idtipo_producto;

    public function __construct(
        $id,
        $nombre_producto,
        $descripcion_producto,
        $imagen_producto,
        $cantidad_producto,
        $precio_producto,
        $estado_producto,
        $idtipo_producto
    ) {
        $this->id = $id;
        $this->nombre_producto = $nombre_producto;
        $this->descripcion_producto = $descripcion_producto;
        $this->imagen_producto = $imagen_producto;
        $this->cantidad_producto = $cantidad_producto;
        $this->precio_producto = $precio_producto;
        $this->estado_producto = $estado_producto;
        $this->idtipo_producto = $idtipo_producto;
    }



    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNombre_producto()
    {
        return $this->nombre_producto;
    }


    public function setNombre_producto($nombre_producto)
    {
        $this->nombre_producto = $nombre_producto;

        return $this;
    }


    public function getDescripcion_producto()
    {
        return $this->descripcion_producto;
    }


    public function setDescripcion_producto($descripcion_producto)
    {
        $this->descripcion_producto = $descripcion_producto;

        return $this;
    }


    public function getCantidad_producto()
    {
        return $this->cantidad_producto;
    }


    public function setCantidad_producto($cantidad_producto)
    {
        $this->cantidad_producto = $cantidad_producto;

        return $this;
    }


    public function getImagen_producto()
    {
        return $this->imagen_producto;
    }


    public function setImagen_producto($imagen_producto)
    {
        $this->imagen_producto = $imagen_producto;

        return $this;
    }


    public function getPrecio_producto()
    {
        return $this->precio_producto;
    }


    public function setPrecio_producto($precio_producto)
    {
        $this->precio_producto = $precio_producto;

        return $this;
    }


    public function getEstado_producto()
    {
        return $this->estado_producto;
    }


    public function setEstado_producto($estado_producto)
    {
        $this->estado_producto = $estado_producto;

        return $this;
    }

    public function getIdtipo_producto()
    {
        return $this->idtipo_producto;
    }

    public function setIdtipo_producto($idtipo_producto)
    {
        $this->idtipo_producto = $idtipo_producto;

        return $this;
    }


    public function toArray()
    {
        $vars = get_object_vars($this);
        $array = array();
        foreach ($vars as $key => $value) {
            $array[ltrim($key, '_')] = $value;
        }
        return $array;
    }
}
