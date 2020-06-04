<?php

require_once("datasource.php");
require_once(__DIR__ . "/../entities/usuario.php");

class UsuarioDAO
{

    public function autenticarUsuario($user, $pass)
    {
        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM users WHERE correo = :user AND password = :pass",
            array(':user' => $user, ':pass' => $pass)
        );
        $usuario = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $usuario = new Usuario(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["correo"],
                    $data_table[$indice]["password"],
                    $data_table[$indice]["imagen"],
                    $data_table[$indice]["tipo"],
                    $data_table[$indice]["telefono"],
                    $data_table[$indice]["direccion"]
                );
            }
            return $usuario;
        } else {
            return null;
        }
    }

    public function buscarUsuarioPorId($id)
    {
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM users WHERE id = :id",
            array(':id' => $id)
        );
        $usuario = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $usuario = new Usuario(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["correo"],
                    $data_table[$indice]["password"],
                    $data_table[$indice]["imagen"],
                    $data_table[$indice]["tipo"],
                    $data_table[$indice]["telefono"],
                    $data_table[$indice]["direccion"]
                );
            }
            return $usuario;
        } else {
            return null;
        }
    }

    public function leerUsuarios()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM users");
        $usuario = null;
        $usuarios = array();
        foreach ($data_table as $indice => $valor) {
            $usuario = new Usuario(
                $data_table[$indice]["id"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["correo"],
                $data_table[$indice]["password"],
                $data_table[$indice]["imagen"],
                $data_table[$indice]["tipo"],
                $data_table[$indice]["telefono"],
                $data_table[$indice]["direccion"]
            );
            array_push($usuarios, $usuario);
        }
        return $data_table;
    }

    public function insertarUsuario(Usuario $usuario)
    {
        $data_source = new DataSource();
        $sql = "INSERT INTO users VALUES (:id, :nombre, :correo, :password, :imagen, :tipo, :telefono, :direccion )";
        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':id' => $usuario->getId(),
                ':nombre' => $usuario->getNombre(),
                ':correo' => $usuario->getCorreo(),
                ':password' => $usuario->getPassword(),
                ':imagen' => $usuario->getImage(),
                ':tipo' => $usuario->getTipo(),
                ':telefono' => $usuario->getTelefono(),
                ':direccion' => $usuario->getDireccion()

            )
        );

        return $resultado;
    }


    public function modificarUsuario(Usuario $usuario, $id)
    {
        $data_source = new DataSource();
        $sql = "UPDATE users SET nombre= :nombre, correo= :correo, password= :password, imagen= :imagen, 
        tipo= :tipo, telefono= :telefono, direccion= :direccion where id = $id";

        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':nombre' => $usuario->getNombre(),
                ':correo' => $usuario->getCorreo(),
                ':password' => $usuario->getPassword(),
                ':imagen' => $usuario->getImage(),
                ':tipo' => $usuario->getTipo(),
                ':telefono' => $usuario->getTelefono(),
                ':direccion' => $usuario->getDireccion()
            )
        );

        return $resultado;
    }

    public function borrarUsuario($id)
    {
        $data_source = new DataSource();
        $usuario =  buscarUsuarioPorId($id);
        $resultado = $data_source->ejecutarActualizacion("DELETE FROM users WHERE id = :id", array('id' => $id));

        return $resultado;
    }
}
