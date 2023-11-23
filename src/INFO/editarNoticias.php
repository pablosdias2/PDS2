<?php
// Inicie a sessão no início do script PHP
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Notícias</title>
    <!-- Adicione os links necessários para os estilos e scripts, como Bootstrap e DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Adicione estilos personalizados aqui */
        body {
            background-color: #f8f9fa;
            /* Cor de fundo da página */
        }

        .container {
            background-color: #ffffff;
            /* Cor de fundo do contêiner */
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            /* Cor do título principal */
        }

        #noticiasTable {
            width: 100%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Adicione a biblioteca SweetAlert -->
</head>

<body>

    <!-- Conteúdo da Página -->
    <div class="container">
        <h1 class="text-center">Lista de Notícias</h1>

        <!-- Tabela DataTables -->
        <table id="noticiasTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Os dados da tabela serão carregados dinamicamente aqui -->
            </tbody>
        </table>
        <div class="text-center">
            <a href="./administrar.php" class="btn btn-primary mb-3">Voltar para Administração</a>
        </div>
    </div>

    <!-- Script para inicializar a DataTable e carregar dados -->
    <script>
        $(document).ready(function() {
            // Inicializar DataTable
            var table = $('#noticiasTable').DataTable({
                ajax: {
                    url: './PHP/noticias.php', // Script PHP para obter dados das notícias
                    dataSrc: ''
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'titulo'
                    },
                    {
                        data: 'autor'
                    },
                    {
                        data: 'categoria'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button class="btn btn-warning edit-btn" onclick="editNoticia(' + row.id + ')">Editar</button>';
                        }
                    }
                ]
            });
        });
    </script>    
    <script>
    function editNoticia(id) {
        // Redireciona para a página de edição, passando o ID da notícia como parâmetro
        window.location.href = './editar_noticia.php?id=' + id;
    }
</script>

</body>

</html>