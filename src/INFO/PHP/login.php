<?php
include './db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $checkUserQuery = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $checkUserResult = $conn->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        // Login bem-sucedido
        echo "Sucesso: Login bem-sucedido!";
        $_SESSION['email'] = $email;
    } else {
        // Credenciais inválidas
        echo "Erro: Credenciais inválidas. Verifique seu e-mail e senha.";
    }
} else {
    // Método não permitido
    http_response_code(405);
    echo "Erro: Método não permitido";
}
?>
