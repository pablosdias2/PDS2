<?php

require_once("UsuarioDAO.php");

class Usuario extends UsuarioDAO{

    private $id;
    private $email;
    private $senha;
    private $data_de_registro;
    private $username;
    private $nome;

    //Métodos set
    public function setId($id){
        $this->id=$id;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function setSenha($senha){
        $this->senha=$senha;
    }

    public function setData_de_registro($data_de_registro){
        $this->data_de_registro=$data_de_registro;
    }

    public function setUsername($username){
        $this->username=$username;
    }

    public function setNome($nome){
        $this->nome=$nome;
    }

    //Métodos get
    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getData_de_registro(){
        return $this->data_de_registro;
    }

    public function getUsername(){
        return $this->username;
    }
    
    public function getNome(){
        return $this->nome;
    }

    //Métodos
    public function criaUsuario(){
        return $this->setUsuario($this->getId(), $this->getEmail(), $this->getSenha(), $this->getData_de_registro(), $this->getUsername(), $this->getNome())
    }
}