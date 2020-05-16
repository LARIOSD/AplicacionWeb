<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entities/Usuario.php");

class UsuarioDAO
{

    public function autenticarUsuario($user, $pass){
        $data_source = new DataSource();
     
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE correo = :user AND password = :pass", 
                                                    array(':user'=>$user,':pass'=>$pass));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["id"],
                        $data_table[$indice]["nombre"],
                        $data_table[$indice]["correo"],
                        $data_table[$indice]["password"],
                        );
            }
            return $usuario;
        }else{
            return null;
        }
    }

    public function buscarUsuarioPorId($id)
    {
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM usuario WHERE id = :id",
            array(':id' => $id)
        );
        $usuario = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $usuario = new Usuario(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["apellido"],
                    $data_table[$indice]["correo"],
                    $data_table[$indice]["password"],
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
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario");
        $usuario = null;
        $usuarios = array();
        foreach ($data_table as $indice => $valor) {
            $usuario = new Usuario(
                $data_table[$indice]["id"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["correo"],
                $data_table[$indice]["password"],
            );
            array_push($usuarios, $usuario);
        }
        return $data_table;
    }

    public function insertarUsuario(Usuario $usuario)
    {
        $data_source = new DataSource();
        $sql = "INSERT INTO usuario VALUES (:id, :nombre, :correo, :password)";
        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':id' => $usuario->getId(),
                ':nombre' => $usuario->getNombre(),
                ':correo' => $usuario->getUsername(),
                ':password' => $usuario->getPassword()
            )
        );

        return $resultado;
    }


    public function modificarUsuario(Usuario $usuario, $id)
    {
        $data_source = new DataSource();
        $sql = "UPDATE usuario SET nombre= :nombre, correo= :correo, password= :password where id = $id";

        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':nombre' => $usuario->getNombre(),
                ':correo' => $usuario->getUsername(),
                ':password' => $usuario->getPassword()
            )
        );

        return $resultado;
    }

    public function borrarUsuario($id)
    {
        $data_source = new DataSource();
        $usuario =  buscarUsuarioPorId($id);
        $resultado = $data_source->ejecutarActualizacion("DELETE FROM usuario WHERE id = :id", array('id' => $id));

        return $resultado;
    }
}
