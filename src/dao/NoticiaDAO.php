<?php

require_once("../init.php");
require_once("../dao/Connection.php");
require_once("../model/Noticia.php");


class NoticiaDAO{


    public static function create($args)
    {
        return self::criarNovaNoticia($args);
    }

    public static function delete($args)
    {
        return self::deletarNoticia($args);
    }


    protected static function criarNovaNoticia(Noticia $noticia): ?Noticia
    {
        try {
            $conn = Connection::getConn();

            $insert = $conn->prepare(
                'INSERT INTO noticia (id, titulo, descricao, "data", autor, imagem)
                VALUES (?, LOWER(?), ?, ?, LOWER(?), LOWER(?), ?)'
            );

            $insert->bindValue(2, $noticia->getTitulo());
            $insert->bindValue(3, $noticia->getTexto());
            $insert->bindValue(5, $noticia->getAutor());
            $insert->bindValue(6, $noticia->getImagem());


            if ($insert->execute()) {
                $noticia->setId(Connection::getConn()->lastInsertId());
                return $noticia;
            } else {
                return null;
            }
        } catch (Exception $e) {
            Connection::showLog($e->getMessage());
        }
    }

    protected static function deletarNoticia(int $id)
    {
        try {
            $conn = Connection::getConn();
      
            $delete = $conn->prepare(
              'DELETE FROM noticia
                     WHERE id = ?'
            );
      
            $delete->bindValue(1, $id);
      
            $delete->execute();
      
            return $delete->rowCount() == '0' ? FALSE : TRUE;
          } catch (Exception $e) {
            Connection::showLog($e->getMessage());
          }  
    }
}