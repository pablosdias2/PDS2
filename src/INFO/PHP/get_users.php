<?php
// Conexão com o banco de dados (substitua com suas próprias configurações)
include './db.php';

// Consulta para obter todos os usuários
$sql = "SELECT id, email, nome FROM usuarios";
$result = $conn->query($sql);

// Preparar os dados para DataTables
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Fechar a conexão com o banco de dados
$conn->close();

// Retornar os dados em formato JSON
echo json_encode($data);
?>
