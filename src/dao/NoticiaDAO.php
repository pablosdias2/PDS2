<?php

require_once("../init.php");
require_once("../dao/Connection.php");
require_once("../model/Noticia.php");


class NoticiaDAO
{


    public static function create($args)
    {
        return self::criarNovaNoticia($args);
    }

    public static function delete($args)
    {
        return self::deletarNoticia($args);
    }

    public static function update($args)
    {
        return self::updateNoticia($args);
    }

    public static function read($args)
    {
        switch ($args[0]) {
            case "getById":
                return self::buscarNoticiaPeloId($args[1]);
        }
    }


    protected static function criarNovaNoticia(Noticia $noticia): ?Noticia
    {
        try {
            $conn = Connection::getConn();

            $insert = $conn->prepare(
                'INSERT INTO noticia (id, titulo, descricao, texto, data_de_criacao, autor, imagem)
                VALUES (?, LOWER(?), ?, ?, LOWER(?), LOWER(?), ?)'
            );

            $insert->bindValue(2, $noticia->getTitulo());
            $insert->bindValue(3, $noticia->getDescricao());
            $insert->bindValue(4, $noticia->getDescricao());
            $insert->bindValue(6, $noticia->getAutor());
            $insert->bindValue(7, $noticia->getImagem());


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

    protected static function updateNoticia(Noticia $noticia)
    {
        try {
            $conn = Connection::getConn();

            $atualizar = $conn->prepare(
                'UPDATE noticia
				SET 
				  titulo = LOWER(?), descricao = LOWER(?), texto = LOWER(?), imagem = ?
				WHERE
				  id = ?'
            );

            $atualizar->bindValue(1, $noticia->getTitulo());
            $atualizar->bindValue(2, $noticia->getDescricao());
            $atualizar->bindValue(3, $noticia->getTexto());
            $atualizar->bindValue(4, $noticia->getImagem());
            $atualizar->bindValue(5, $noticia->getId());

            $atualizar->execute();

            return $atualizar->rowCount() > 0 ? TRUE : FALSE;

            return null;
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

    protected static function buscarNoticiaPeloId(String $id): ?Noticia
    {
        try {
            $conn = Connection::getConn();

            $sql = $conn->prepare(
                "SELECT * FROM noticia
				 WHERE id = ?"
            );
            $sql->bindValue(1, $id);

            $sql->execute();

            if ($sql->rowCount() > 0) {
                $resultado = $sql->fetch(); //Pegando apenas 1 linha
                return Noticia::completeObject($resultado);
            }

            return null;
        } catch (Exception $e) {
            Connection::showLog($e->getMessage());
        }
    }
}
