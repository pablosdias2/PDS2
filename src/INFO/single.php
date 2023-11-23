<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>INFOOTBALL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">


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

    <!-- Include da conexão -->
    <?php include './PHP/db.php'; ?>
    <!-- Include das funções -->
    <?php include './PHP/get_noticias.php'; ?>
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
                    <a href="single.php" class="nav-item nav-link active">News</a>
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


    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0" style="width: calc(100% - 180px); padding-right: 100px;">
                            <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Escalação da Seleção: Diniz define Brasil para enfrentar Argentina com trocas na lateral e no ataque</a></div>
                            <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Eurocopa 2024 tem 20 seleções definidas; veja panorama</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="caminho/para/as/imagens/<?php echo $noticia['imagem']; ?>" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4" id="noticiaDetails">
                        <!-- Dados da notícia serão carregados dinamicamente aqui -->
                        <?php
                        // Supondo que o ID da notícia seja passado via parâmetro GET
                        if (isset($_GET['id'])) {
                            $noticiaId = $_GET['id'];

                            // Chamar a função para obter detalhes da notícia
                            $noticia = obterDetalhesNoticia($conn, $noticiaId);

                            // Verifique se há resultados
                            if ($noticia) {
                                // Exiba os detalhes da notícia
                                echo "<h2>" . $noticia['titulo'] . "</h2>";
                                echo "<p>Por: " . $noticia['autor'] . "</p>";
                                echo "<p>" . $noticia['texto'] . "</p>";
                            } else {
                                echo "<p>Nenhuma notícia encontrada.</p>";
                            }
                        } else {
                            echo "<p>Nenhuma notícia selecionada.</p>";
                        }
                        ?>
                    </div>
                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center">
                            <span id="author"><?php echo isset($noticia['data_publicacao']) ? $noticia['data_publicacao'] : ''; ?></span>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">INFOOTBALL</a>. All Rights Reserved.
        </p>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


</body>

</html>