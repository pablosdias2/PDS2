<?php

include './PHP/db.php';

// Verifique se o parâmetro 'id' foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $noticia_id = $_GET['id'];

    // Recupere os dados da notícia com base no ID
    $sql = "SELECT * FROM noticias WHERE id = $noticia_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $noticia = $result->fetch_assoc();
    } else {
        echo "Notícia não encontrada.";
        exit();
    }
} else {
    echo "ID da notícia não fornecido.";
    exit();
}

// Verifique se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $noticia_id = $_POST['noticia_id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];
    $texto = $_POST['texto'];

    // Atualize os dados da notícia no banco de dados
    $sql = "UPDATE noticias SET titulo = '$titulo', autor = '$autor', categoria = '$categoria', texto = '$texto' WHERE id = $noticia_id";

    if ($conn->query($sql) === TRUE) {
        echo "Notícia atualizada com sucesso.";
        // Redirecione para a página de edição de notícias
        header("Location: editarNoticias.php");
        exit();
    } else {
        echo "Erro ao atualizar notícia: " . $conn->error;
    }
}

// Feche a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notícia</title>
    <!-- Adicione seus links de estilo aqui -->
    <link rel="stylesheet" href="caminho/para/seu/estilo.css">
    <!-- Adicione Bootstrap para melhorar a aparência -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>Editar Notícia</h1>
            </div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $noticia_id; ?>" method="post">
                    <input type="hidden" name="noticia_id" value="<?php echo $noticia['id']; ?>">

                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" class="form-control" value="<?php echo $noticia['titulo']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="autor">Autor:</label>
                        <input type="text" name="autor" class="form-control" value="<?php echo $noticia['autor']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <input type="text" name="categoria" class="form-control" value="<?php echo $noticia['categoria']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="texto">Conteúdo:</label>
                        <textarea name="texto" class="form-control" rows="5" required><?php echo $noticia['texto']; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
                <a href="editarNoticias.php" class="btn btn-secondary mt-3">Voltar para Edição de Notícias</a>
            </div>
        </div>
    </div>

    <!-- Adicione seus scripts aqui, se necessário -->
    <script src="caminho/para/seu/script.js"></script>
    <!-- Adicione Bootstrap JS para funcionalidades extras -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>