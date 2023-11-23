<?php
// Inclua o seu arquivo de conexão com o banco de dados
include './db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noticiaId = $_POST['id'];

    // Verifique se a notícia existe antes de excluí-la
    $checkNoticiaQuery = "SELECT * FROM noticias WHERE id = '$noticiaId'";
    $checkNoticiaResult = $conn->query($checkNoticiaQuery);

    if ($checkNoticiaResult->num_rows > 0) {
        // A notícia existe, então exclua
        $deleteNoticiaQuery = "DELETE FROM noticias WHERE id = '$noticiaId'";

        if ($conn->query($deleteNoticiaQuery) === TRUE) {
            // Exclusão bem-sucedida
            echo "Sucesso: Notícia excluída com sucesso!";
        } else {
            // Erro na exclusão
            echo "Erro: Não foi possível excluir a notícia.";
        }
    } else {
        // A notícia não existe
        echo "Erro: A notícia não existe.";
    }
} else {
    // Método não permitido
    http_response_code(405);
    echo "Erro: Método não permitido";
}

// Feche a conexão com o banco de dados
$conn->close();
?>
