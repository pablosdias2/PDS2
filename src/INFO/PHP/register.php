<?php
include './db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o e-mail já está em uso
    $checkEmailQuery = "SELECT * FROM usuarios WHERE email = '$email'";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        // E-mail já está em uso
        echo "Erro: O e-mail já está em uso por outro usuário. Escolha outro e-mail.";
    } else {
        // Inserção no banco de dados
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        if ($conn->query($sql) === TRUE) {
            // Registro bem-sucedido
            echo "Sucesso: Registro bem-sucedido!";
        } else {
            // Erro no registro
            echo "Erro: " . $conn->error;
        }
    }
} else {
    // Método não permitido
    http_response_code(405);
    echo "Erro: Método não permitido";
}
?>
