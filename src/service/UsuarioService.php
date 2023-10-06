<?php

require_once("../model/Usuario.php");
require_once("../dao/UsuarioDAO.php");

class UsuarioService
{

    public static function handleCreateNewUser($args): ?Usuario
    {
        $userAlreadyExists = UsuarioDAO::read(array("getByEmail", $args["email"]));

        if ($userAlreadyExists) {
            return null;
        }

        $usuario = Usuario::completeObject($args);

        return UsuarioDAO::create($usuario);
    }

    public static function updateUser($args): ?Usuario
    {
        return isset($email) ? UsuarioDAO::update(array($args["updateField"], $args)) : null;
    }

    public static function deleteUser($args)
    {
        return isset($args) ? UsuarioDAO::delete($args["id"]) : null;
    }

    public static function getByEmail(?string $email): ?Usuario
    {
        return isset($email) ? UsuarioDAO::read(array("getByEmail", $email)) : null;
    }

    public static function getById(string $id): ?Usuario
    {
        return isset($id) ? UsuarioDAO::read(array("getById", $id)) : null;
    }

    public static function loginUser($args): ?Usuario
    {
        return isset($args) ? UsuarioDAO::read($args) : null;
    }
}
