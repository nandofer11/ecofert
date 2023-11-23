<?php

session_start();

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Noticias</title>
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
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <?php require("php/navbar.php") ?>
        </div>

    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Noticias</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col">
                    <div class="card h-100" style="width: 18rem;">
                        <img class="card-img-top" src="./img/noticia1.jpg" alt="Card image cap">
                        <h5 class="card-title">Ecofert: Nutriendo la Agricultura Sostenible</h5>
                        <div class="card-body">
                            <p class="card-text">Sumérgete en el mundo de Ecofert y descubre cómo estamos revolucionando la agricultura a través de nuestra plataforma de fertilizantes naturales y nutrientes foliares. En este post, exploraremos los beneficios que brindamos a agricultores y al medio ambiente, así como los desafíos que enfrentamos en nuestra misión por un futuro agrícola más ecológico.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización hace 3 minutos</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" style="width: 18rem;">
                        <img class="card-img-top" src="./img/noticia2.jpg" alt="Card image cap">
                        <h5 class="card-title">Ecofert: Su Socio en la Productividad Agrícola</h5>
                        <div class="card-body">
                            <p class="card-text"> En Ecofert, estamos comprometidos a ser su aliado número uno en la mejora de la productividad agrícola. Nuestra plataforma de fertilizantes naturales y nutrientes foliares no solo nutre sus cultivos, sino que también impulsa sus ganancias. Descubra cómo nuestra tecnología innovadora, asesoramiento experto y productos de alta calidad están transformando la forma en que los productores de fertilizantes y agricultores trabajan. </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización hace 3 minutos</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" style="width: 18rem;">
                        <img class="card-img-top" src="./img/noticia3.jpg" alt="Card image cap">
                        <h5 class="card-title">Ecofert: Sostenibilidad de Principio a Fin</h5>
                        <div class="card-body">
                            <p class="card-text">En Ecofert, la sostenibilidad es más que una palabra de moda; es un compromiso que mantenemos de principio a fin. Nuestra plataforma no solo ofrece fertilizantes naturales y nutrientes foliares de alta calidad, sino que también promueve prácticas agrícolas sostenibles. Desde la producción de nuestros productos hasta su aplicación en los campos, cada paso se enfoca en minimizar el impacto ambiental.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización hace 3 minutos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->




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