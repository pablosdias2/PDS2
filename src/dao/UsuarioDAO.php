<?php

require_once("../init.php");
require_once("../dao/Connection.php");
require_once("../model/Usuario.php");

class UsuarioDAO
{

    public static function create($args)
    {
        return self::inserirNovoUsuario($args);
    }

    public static function read($args)
    {
        switch ($args[0]) {
            case "getById":
                return self::buscarUserPeloId($args[1]);
            case "getByEmail":
                return self::buscarUserPeloEmail($args[1]);
            case "login":
                return self::loginUser($args[1], $args[2]);
        }
    }

    public static function update($args)
    {
        switch ($args[0]) {
            case "email":
                return self::updateEmail($args[1]["id"], $args[1]["email"]);
            case "nome":
                return self::updateNome($args[1]["id"], $args[1]["nome"]);
            case "senha":
                return self::updateSenha($args[1]["id"], $args[1]["senha"]);
        }
    }

    public static function delete($args)
    {
        return self::deletarUsuario($args);
    }

    protected static function buscarUserPeloEmail(String $email): ?Usuario
    {
        try {
            $conn = Connection::getConn();

            $sql = $conn->prepare(
                "SELECT * FROM usuarios
                     WHERE LOWER(email) = LOWER(?)
                     LIMIT 1"
            );
            $sql->bindValue(1, $email);

            $sql->execute();

            if ($sql->rowCount() > 0) {
                $resultado = $sql->fetch(); //Pegando apenas 1 linha
                return Usuario::completeObject($resultado);
            }

            return null;
        } catch (Exception $e) {
            Connection::showLog($e->getMessage());
        }
    }

    protected static function buscarUserPeloId(String $id): ?Usuario
    {
        try {
            $conn = Connection::getConn();

            $sql = $conn->prepare(
                "SELECT * FROM usuarios
				 WHERE id = ?"
            );
            $sql->bindValue(1, $id);

            $sql->execute();

            if ($sql->rowCount() > 0) {
                $resultado = $sql->fetch(); //Pegando apenas 1 linha
                return Usuario::completeObject($resultado);
            }

            return null;
        } catch (Exception $e) {
            Connection::showLog($e->getMessage());
        }
    }

    protected static function loginUser(string $email, string $senha): ?Usuario
    {
        $conn = Connection::getConn();

        $sql = $conn->prepare(
            "SELECT * FROM usuarios
				WHERE email = ? AND senha = ?"
        );
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);

        $res = $sql->execute();

        if ($res == 1) {
            if ($sql->rowCount() > 0) {
                $resultado = $sql->fetch();
                return Usuario::completeObject($resultado);
            } else
                return NULL;
        }
    }


    protected static function inserirNovoUsuario(Usuario $user): ?Usuario
    {
        try {
            $conn = Connection::getConn();

            $insert = $conn->prepare(
                'INSERT INTO usuarios (id, email, senha, data_de_registro, username, nome, privilegio)
                VALUES (?, LOWER(?), ?, ?, LOWER(?), LOWER(?), ?)'
            );

            $insert->bindValue(1, $user->getId());
            $insert->bindValue(2, $user->getEmail());
            $insert->bindValue(3, $user->getSenha());
            $insert->bindValue(4, $user->getData_de_registro()->format('Y-m-d H:i:s'));
            $insert->bindValue(5, $user->getUsername());
            $insert->bindValue(6, $user->getNome());
            $insert->bindValue(7, $user->getPrivilegio());

            if ($insert->execute()) {
                $user->setId(Connection::getConn()->lastInsertId());
                return $user;
            } else {
                return null;
            }
        } catch (Exception $e) {
            Connection::showLog($e->getMessage());
        }
    }

    protected static function deletarUsuario(int $id)
    {
        try {
            $conn = Connection::getConn();
      
            $delete = $conn->prepare(
              'DELETE FROM usuarios
                     WHERE id = ?'
            );
      
            $delete->bindValue(1, $id);
      
            $delete->execute();
      
            return $delete->rowCount() == '0' ? FALSE : TRUE;
          } catch (Exception $e) {
            Connection::showLog($e->getMessage());
          }  
    }

    protected static function updateEmail(String $id, String $email)
    {
        try {
            $conn = Connection::getConn();

            $atualizar = $conn->prepare(
                'UPDATE usuarios
				SET 
				  email = LOWER(?)
				WHERE
				  id = ?'
            );

            $atualizar->bindValue(1, $email);
            $atualizar->bindValue(2, $id);

            $atualizar->execute();

            return $atualizar->rowCount() > 0 ? TRUE : FALSE;

            return null;
        } catch (Exception $e) {
            Connection::showLog($e->getMessage());
        }
    }

    protected static function updateNome(int $id, String $nome)
    {
        try {
            $conn = Connection::getConn();

            $atualizar = $conn->prepare(
                'UPDATE usuarios
				SET 
				  nome = LOWER(?)
				WHERE
                id = ?'
            );

            $atualizar->bindValue(1, $nome);
            $atualizar->bindValue(2, $id);

            $atualizar->execute();

            return $atualizar->rowCount() > 0 ? TRUE : FALSE;

        } catch (Exception $e) {
            Connection::showLog($e->getMessage());
        }
    }

    protected static function updateSenha(String $id, String $senha)
    {
        try {
            $conn = Connection::getConn();

            $atualizar = $conn->prepare(
                'UPDATE usuarios
				SET 
				  senha = LOWER(?)
				WHERE
				  id = ?'
            );

            $atualizar->bindValue(1, $senha);
            $atualizar->bindValue(2, $id);

            $atualizar->execute();


            return $atualizar->rowCount() > 0 ? TRUE : FALSE;

        } catch (Exception $e) {
            Connection::showLog($e->getMessage());
        }
    }
}
