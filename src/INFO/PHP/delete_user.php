<?php
// Conexão com o banco de dados (substitua com suas próprias configurações)
include './db.php';

// Verificar se o ID do usuário foi enviado
if (isset($_POST['id'])) {
    $userId = $_POST['id'];

    // Consulta para excluir o usuário com o ID fornecido
    $sql = "DELETE FROM usuarios WHERE id = $userId";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir usuário: " . $conn->error;
    }
} else {
    echo "Erro: ID do usuário não fornecido.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
