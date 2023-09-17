<?php

require_once("../dao/UsuarioDAO.php");

class Usuario extends UsuarioDAO
{

    private $id;
    private $email;
    private $senha;
    private DateTime $data_de_registro;
    private $username;
    private $nome;
    private $privilegio;

    public static function completeObject(array $row)
    {
        $instance = new static();
        $instance->fill($row);
        return $instance;
    }

    public static function loginObject(String $email, String $senha)
    {
        $instance = new static();
        $instance->email = $email;
        $instance->senha = $senha;

        return $instance;
    }

    protected function fill(array $row)
    {
        $this->id = 3;
        $this->email = $row["email"];
        $this->senha = $row["senha"];
        $this->data_de_registro = new DateTime('NOW');
        $this->username = $row["username"];
        $this->nome = $row["nome"];
        $this->privilegio = 0;
    }

    public function toDataContract()
    {
        return array(
            "id" => $this->getId(),
            "email" => $this->getEmail(),
            "senha" => $this->getSenha(),
            "data_de_registro" => $this->getData_de_registro(),
            "username" => $this->getUsername(),
            "nome" => $this->getNome(),
            "privilegio" => $this->getPrivilegio(),
        );
    }


    //Métodos set
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setData_de_registro(DateTime $data_de_registro)
    {
        $this->data_de_registro = $data_de_registro;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setPrivilegio($privilegio)
    {
        $this->privilegio = $privilegio;
    }

    //Métodos get
    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getData_de_registro(): DateTime
    {
        return $this->data_de_registro;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getPrivilegio()
    {
        return $this->privilegio;
    }
}
