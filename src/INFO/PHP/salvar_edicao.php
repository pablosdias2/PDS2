<?php
include './db.php';

// Verifique se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $noticia_id = $_POST['noticia_id'];
    $titulo = $_POST['titulo'];

    // Atualize os dados da notícia no banco de dados
    $sql = "UPDATE noticias SET titulo = '$titulo' WHERE id = $noticia_id";

    if ($conn->query($sql) === TRUE) {
        echo "Notícia atualizada com sucesso.";
    } else {
        echo "Erro ao atualizar notícia: " . $conn->error;
    }
}

// Feche a conexão
$conn->close();
?>
