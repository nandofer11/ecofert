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
    <title>Empresa</title>
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Nuestra empresa</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container mt-4">
    <div class="row">
    <div class="col-md-6">
    <h2>Empresa Ecofert</h2>
    <p>Ecofert es una empresa peruana con sede en Trujillo, La Libertad, que se especializa en la producción y distribución de fertilizantes naturales. Nos dedicamos a ofrecer soluciones sostenibles para mejorar la productividad agrícola y promover prácticas agrícolas respetuosas con el medio ambiente.</p>

    <p>Nuestro compromiso con la calidad y la innovación nos ha convertido en líderes en el mercado de fertilizantes naturales en la región. Trabajamos en estrecha colaboración con agricultores locales, brindándoles productos de alta calidad que ayudan a optimizar sus cosechas y a mejorar la salud de sus suelos.</p>

    <p>Desde nuestra fundación, hemos estado comprometidos con el desarrollo sostenible de la agricultura, contribuyendo al bienestar de los agricultores y al crecimiento económico de nuestras comunidades. En Ecofert, creemos en un futuro agrícola más sostenible y saludable para todos.</p>
</div>

        <div class="col-md-6">
            <img src="./img/post_.jpg" alt="Logo de Ecofert" class="img-fluid">
        </div>
    </div>

    <div class="row mt-4 bg-primary p-4">
        <div class="col">
            <h3>Misión</h3>
            <p>Nuestra misión es proporcionar fertilizantes naturales de alta calidad que promuevan la productividad agrícola, respetando al mismo tiempo el medio ambiente y la salud de los agricultores.</p>
        </div>
        <div class="col">
            <h3>Visión</h3>
            <p>Aspiramos a ser líderes en la industria de fertilizantes naturales, ofreciendo soluciones innovadoras y sostenibles que impulsen el crecimiento de la agricultura en la región y más allá.</p>
        </div>

        <div class="col">
            <h3>Compromiso</h3>
            <p>En Ecofert, nuestro compromiso va más allá de ser un simple intermediario en el comercio de fertilizantes naturales. Nos enorgullece ser un puente sólido entre los agricultores y los productores locales.</p>
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