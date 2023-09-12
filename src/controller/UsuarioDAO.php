<?php

    require_once("../init.php");

    class UsuarioDAO{

        protected $mysqli;

        public function __construct(){
            $this->conexao();
        }

        private function conexao(){
            $this->$mysqli = new mysqli_connect('localhost', 'root'. '123456', 'infootball');

            if ($mysqli->connect_error) {
                die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
            }
        }

        public function criaUsuario($id, $email, $senha, $data_de_registro, $username, $nome){
            $result = mysqli_query($this->mysqli, "INSERT INTO usuarios VALUES ('$id', '$email', '$senha', '$data_de_registro', '$username', '$nome1');");
        }



    }