<?php

require_once("../model/Noticia.php");
require_once("../dao/NoticiaDAO.php");

class NoticiaService
{
    public static function handleCreateNewUser($args): ?Noticia
    {

        $noticia = Noticia::completeObject($args);

        return NoticiaDAO::create($noticia);
    }

    public static function updateNoticia($args)
    {
        $noticia = Noticia::completeObject($args);

        return isset($noticia) ? NoticiaDAO::update(array($noticia)) : null;
    }

    public static function deleteNoticia($args)
    {
        return isset($args) ? NoticiaDAO::delete($args["id"]) : null;
    }

    public static function getById(string $id): ?Noticia
    {
        return isset($id) ? NoticiaDAO::read(array("getById", $id)) : null;
    }
}
