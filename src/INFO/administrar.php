
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-primary">IN<span class="text-secondary font-weight-normal">FOOTBALL</span></h1>
            </a>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">IN<span class="text-white font-weight-normal">FOOTBALL</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="single.php" class="nav-item nav-link">News</a>
                </div>
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="nav-item dropdown ml-auto">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right rounded-0 m-0">
                        <!-- Lógica Simulada: Se o usuário estiver logado -->
                        <script>
                            var usuarioLogado = true;
                            var isAdmin = true;
                            // Defina isso com base na lógica real do lado do servidor

                            if (usuarioLogado) {
                                document.write('<a href="./perfil.php" class="dropdown-item">Perfil</a>');
                                document.write('<div class="dropdown-divider"></div>');
                                if (isAdmin) {
                                    document.write('<a href="./administrar.php" class="dropdown-item">Administrar</a>');
                                }
                                document.write('<div class="dropdown-divider"></div>');
                                document.write('<a href="./PHP/logout.php" class="dropdown-item">Sair</a>');
                            } else {
                                // Se o usuário não estiver logado
                                document.write('<a href="./login.html" class="dropdown-item">Login</a>');
                                document.write('<a href="./register.html" class="dropdown-item">Registrar</a>');
                            }
                        </script>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Conteúdo da Página -->
    <div class="container mt-5">
        <h1>Bem-vindo ao Painel de Administração</h1>

        <!-- Menu de Seleção -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Visualizar Usuarios</h5>
                        <p class="card-text">Selecione esta opção para visualizar um datatable com usuarios existentes.</p>
                        <a href="./datatable_users.php" class="btn btn-primary">Visualizar Usuarios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Criar Notícia</h5>
                        <p class="card-text">Selecione esta opção para criar uma nova notícia usando um formulário.</p>
                        <a href="./criarNoticias.html" class="btn btn-success">Criar Notícia</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Card para Editar Notícia -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Notícia</h5>
                        <p class="card-text">Selecione esta opção para editar uma notícia existente.</p>
                        <a href="./editarNoticias.php" class="btn btn-warning">Editar Notícia</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Card para Excluir Notícia -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Excluir Notícia</h5>
                        <p class="card-text">Selecione esta opção para excluir uma notícia existente.</p>
                        <a href="./excluirNoticias.php" class="btn btn-danger">Excluir Notícia</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Adicione scripts necessários, como scripts DataTables, aqui -->
        <script>
            // Exemplo de inicialização de DataTable (substitua pelo seu código real)
            $(document).ready(function() {
                $('#datatable').DataTable();
            });
        </script>
        <!-- Adicione outros scripts necessários aqui -->

</body>

</html>