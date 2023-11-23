<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "seu_banco_de_dados";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
