<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "seu_banco_de_dados");

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para obter as notícias do banco de dados
$query = "SELECT * FROM noticias";
$resultado = $conn->query($query);

// Array para armazenar as notícias
$noticias = [];

// Verifique se há notícias
if ($resultado->num_rows > 0) {
    while ($noticia = $resultado->fetch_assoc()) {
        $noticias[] = $noticia;
    }
}

// Feche a conexão com o banco de dados
$conn->close();

// Retorne as notícias em formato JSON
header('Content-Type: application/json');
echo json_encode($noticias);
?>
