<?php

class Usuario
{
    private $id;
    private $nombre;
    private $correo;
    private $password;
    private $imagen;
    private $tipo;
    private $telefono;
    private $direccion;

    public function __construct($id, $nombre, $correo, $password, $imagen, $tipo, $telefono, $direccion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->password = $password;
        $this->imagen = $imagen;
        $this->tipo = $tipo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function getImage()
    {
        return $this->imagen;
    }

    public function setImage($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }


    public function getTipo()
    {
        return $this->tipo;
    }


    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }


    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }


    public function getDireccion()
    {
        return $this->direccion;
    }


    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

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