<?php
// Conexão com o banco de dados (substitua com suas próprias configurações)
include './db.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor = $_POST['autor'];
    $descricao = $_POST['descricao'];
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $texto = $_POST['texto'];

    // Tratamento da imagem
    $imagem_nome = $_FILES['imagem']['name'];
    $imagem_temp = $_FILES['imagem']['tmp_name'];

    // Move a imagem para o diretório desejado (substitua 'caminho/do/seu/diretorio' pelo caminho real)
    $caminho_destino = 'C:/xampp/htdocs/INFO/img/' . $imagem_nome;
    move_uploaded_file($imagem_temp, $caminho_destino);

    // Insira os dados no banco de dados (substitua com sua própria lógica)
    $sql = "INSERT INTO noticias (autor, descricao, titulo, categoria, texto, imagem) VALUES ('$autor', '$descricao', '$titulo', '$categoria', '$texto', '$caminho_destino')";

    if ($conn->query($sql) === TRUE) {
        // Registro bem-sucedido
        echo "Notícia enviada com sucesso!";
    } else {
        // Erro no registro
        echo "Erro ao enviar notícia: " . $conn->error;
    }

    // Feche a conexão com o banco de dados
    $conn->close();
}
?>
