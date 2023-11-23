<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location: login.html'); // Redireciona para a página de login se não estiver logado
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>INFOOTBALL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
                    <a href="index.php" class="nav-item nav-link active">Home</a>
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
    <!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 px-0">
            <div class="owl-carousel main-carousel position-relative">

                <?php
                // Chamar a função para obter notícias principais
                $noticiasPrincipais = obterNoticiasPrincipais($conn);

                // Loop através das notícias principais
                foreach ($noticiasPrincipais as $noticia) {
                    echo "<div class='position-relative overflow-hidden' style='height: 500px;'>";
                    echo "<a href='single.php?id=" . $noticia['id'] . "'>";  // Adiciona um link para single.php com o ID da notícia
                    echo "<img class='img-fluid h-100' src='C:/xampp/htdocs/INFO/img/" . $noticia['imagem'] . "' style='object-fit: cover;'>";
                    echo "<div class='overlay'>";
                    echo "<div class='mb-2'>";
                    echo "<a class='badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2' href='#'>" . $noticia['categoria'] . "</a>";
                    echo "<a class='text-white' href='#'><small>" . $noticia['data_publicacao'] . "</small></a>";
                    echo "</div>";
                    echo "<a class='h2 m-0 text-white text-uppercase font-weight-bold' href='single.php?id=" . $noticia['id'] . "'>" . $noticia['titulo'] . "</a>";
                    echo "</a>";  // Fecha o link
                    echo "</div>";
                    echo "</div>";
                }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->

    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">

                <?php
                // Chamar a função para obter notícias em destaque
                $noticiasDestaque = obterNoticiasDestaque($conn);

                // Loop através das notícias
                foreach ($noticiasDestaque as $noticia) {
                    echo "<div class='position-relative overflow-hidden' style='height: 300px;'>";
                    echo "<img class='img-fluid h-100' src='C:/xampp/htdocs/INFO/img/" . $noticia['imagem'] . "' style='object-fit: cover;'>";
                    echo "<div class='overlay'>";
                    echo "<div class='mb-2'>";
                    echo "<a class='badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2' href='#'>" . $noticia['categoria'] . "</a>";
                    echo "<a class='text-white' href='#'><small>" . $noticia['data_publicacao'] . "</small></a>";
                    echo "</div>";
                    echo "<a class='h6 m-0 text-white text-uppercase font-weight-semi-bold' href=''>" . $noticia['titulo'] . "</a>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->
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