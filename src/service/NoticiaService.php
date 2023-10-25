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

    public static function deleteNoticia($args)
    {
        return isset($args) ? NoticiaDAO::delete($args["id"]) : null;
    }

}