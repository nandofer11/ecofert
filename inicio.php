<?php

session_start();

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
    <title>Iniciar Sesión | Ecofert</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top mycss">
        <div class="container">
            <?php require("php/navbar.php") ?>
        </div>

    </div>
    <!-- Navbar End -->

    <?php if (isset($_SESSION['loginCarrito'])) { ?>
        <div class="inicia_primero" id="ventana-emergente">
            <?php echo $_SESSION['loginCarrito']; ?>
            <span class="icon-cancel-circle" id="close-alert"></span>
        </div>
    <?php session_unset();
    } ?>

    <?php
    if (isset($_SESSION['mensaje'])) { ?>
        <div class="inicia_primero" id="ventana-emergente">
            <?php echo $_SESSION['mensaje']; ?>
            <span class="icon-cancel-circle" id="close-alert"></span>
        </div>
    <?php session_unset();
    } ?>

    <?php if (isset($_SESSION['noExisteEmail'])) { ?>
        <div class="inicia_primero" id="ventana-emergente">
            <?php echo $_SESSION['noExisteEmail']; ?>
            <span class="icon-cancel-circle" id="close-alert"></span>
        </div>
    <?php session_unset();
    } ?>
    <!-- Login Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Inicio de sesión</p>
                <!-- <h1 class="display-6">TITULO GRANDE</h1> -->
            </div>

            <div class="row g-5 justify-content-center text-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">

                    <form action="php/ingresar.php" method="POST" autocomplete="off">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input required type="email" class="form-control" id="email" name="emailUser" placeholder="Ingresar tu email">
                                    <label for="email">Ingresa email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input required type="password" name="clave" class="form-control" id="password" placeholder="Ingresar tu contraseña">
                                    <label for="password">Contraseña</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Iniciar</button>
                            </div>
                        </div>
                    </form>
                    <h3 class="mt-4">No estas registrado?</h3>
                    <p class="mb-4"><a href="registro.php">Regístrate aquí</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <?php require("php/footer.php") ?>

        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium" href="#">EcoFert</a>, Todos los derechos reservados.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Trujillo <a class="fw-medium">Perú</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>