<?php
// Inicie a sessão no início do script PHP
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
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

        #userTable {
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
        <h1 class="text-center">Lista de Usuários</h1>

        <!-- Tabela DataTables -->
        <table id="userTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Nome</th>
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
            var table = $('#userTable').DataTable({
                ajax: {
                    url: './PHP/get_users.php', // Script PHP para obter dados dos usuários
                    dataSrc: ''
                },
                columns: [{
                        data: 'email'
                    },
                    {
                        data: 'nome'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button class="btn btn-danger" onclick="confirmDelete(' + row.id + ', \'' + row.email + '\')">Excluir</button>';
                        }
                    }
                ]
            });
        });

        // Obtém o email do usuário logado do PHP (injetado diretamente no script)
        var userEmailLogado = '<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : ""; ?>';

        // Função para confirmar a exclusão de um usuário
        function confirmDelete(userId, userEmail) {
            // Verificar se o usuário sendo excluído não é o usuário logado na sessão
            if (userEmail === userEmailLogado) {
                Swal.fire({
                    title: 'Erro',
                    text: 'Você não pode excluir seu próprio usuário.',
                    icon: 'error',
                });
            } else {
                // Perguntar ao usuário se realmente deseja excluir
                Swal.fire({
                    title: 'Confirmação',
                    text: 'Deseja realmente excluir este usuário?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Chamada AJAX para o script PHP que exclui o usuário
                        deleteUser(userId);
                    }
                });
            }
        }

        // Função para excluir um usuário
        function deleteUser(userId) {
            $.ajax({
                url: './PHP/delete_user.php',
                type: 'POST',
                data: {
                    id: userId
                },
                success: function(response) {
                    // Atualizar a DataTable após excluir o usuário
                    $('#userTable').DataTable().ajax.reload();
                    Swal.fire({
                        title: 'Sucesso',
                        text: response,
                        icon: 'success',
                    });
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    </script>

</body>

</html>