<?php

function buscarUsuarioPorId($id)
{
    require_once(__DIR__ . "/../../model/dao/UsuarioDAO.php");
    $dao = new UsuarioDAO();
    $usuario = $dao->buscarUsuarioPorId($id);
    return $usuario;
}

function autenticarUsuario($correo, $password)
{
    require_once(__DIR__ . "/../../model/dao/UsuarioDAO.php");
    $dao = new UsuarioDAO();
    $usuario = $dao->autenticarUsuario($correo, $password);
    return $usuario;
}

function insertarUsuario($usuario)
{
    require_once(__DIR__ . "/../../model/dao/UsuarioDAO.php");
    $dao = new UsuarioDAO();
    $resultado = $dao->insertarUsuario($usuario);
    return $resultado;
}

function modificarUsuario($usuario,$id)
{
    require_once(__DIR__ . "/../../model/dao/UsuarioDAO.php");
    $dao = new UsuarioDAO();
    $resultado = $dao->modificarUsuario($usuario,$id);
    return $resultado;
}

function borrarUsuario($id)
{
    require_once(__DIR__ . "/../../model/dao/UsuarioDAO.php");
    $dao = new UsuarioDAO();
    $resultado = $dao->borrarUsuario($id);
    return $resultado;
}

function leerUsuarios(){
    require_once(__DIR__ . "/../../model/dao/UsuarioDAO.php");
    $dao = new UsuarioDAO();
    $resultado = $dao->leerUsuarios();
    return $resultado;
}