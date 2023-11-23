<?php
session_start();
include("php/conexion.php");

if (isset($_SESSION['datos'])) {
    $id_User = $_SESSION['datos']['id'];

    $consulta = "SELECT * FROM carrito_compras WHERE id_usuario = '$id_User'";
    $resultado = mysqli_query($conexion, $consulta);

    $cantidad = mysqli_num_rows($resultado);
} else {
    $cantidad = 0;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>EcoFert</title>
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
    <div class="container-fluid bg-white sticky-top nav_component">
        <div class="container">
            <?php require("php/navbar.php") ?>
        </div>

    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Bienvenido a <strong class="text-dark">EcoFert</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Productos Orgánicos de calidad</h1>
                                    <a href="./catalogo.php" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Catálogo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Envíos a todo el <strong class="text-dark">Perú</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Nutrientes foliares</h1>
                                    <a href="./catalogo.php" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Catálogo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Products Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3 justify-content-center">
                        <div class="col-6 text-end">
                            <div class="card mb-3">
                                <img src="img/nitrogeno-organico.png" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Fertilizantes Orgánicos</h5>
                                    <p class="card-text">Como empresa fertilizantes, importamos productos de la más alta calidad desde países como Brasil, Chile, Argentina, Costa Rica y Colombia entre otros.</p>
                                    <a href="catalogo.php?id=organicos" class="btn btn-primary rounded-pill py-3 px-5">Ver Productos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-3 justify-content-center">
                        <div class="col-6 text-end">
                            <div class="card mb-3">
                                <img src="img/ferti.png" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Nutrientes foliares</h5>
                                    <p class="card-text">Fertilizantes de excelente calidad gracias a la red de agricultores y proveedores con los que contamos a lo largo de todo el territorio nacional.</p>
                                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">Ver Productos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Article Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid" src="img/article.jpg" alt="">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Articulo</p>
                        <h1 class="display-6">Ecofert: Fortaleciendo a los Agricultores y Productores.</h1>
                    </div>
                    <p class="mb-4">Introducción:
En el corazón de la misión de Ecofert se encuentra un compromiso sólido con el bienestar de los agricultores y productores locales. Como plataforma de comercio electrónico, Ecofert actúa como un puente entre los cultivadores y los consumidores, conectando a los agricultores directamente con los productores de fertilizantes naturales y nutrientes foliares. </p>
                    <p class="mb-4">En este artículo, exploraremos cómo Ecofert beneficia y apoya a esta valiosa población, contribuyendo al crecimiento sostenible de la agricultura local.</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">Leer más</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Article End -->


    <!-- Video Start -->
    <div class="container-fluid video my-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="py-5">
                        <h1 class="display-6 mb-4">Transformando la Agricultura con <span class="text-white">Sostenibilidad</span></h1>
                        <h5 class="fw-normal lh-base fst-italic text-white mb-5">Descubre nuestro compromiso con la sostenibilidad y la conexión directa entre productores y agricultores.</h5>
                        <div class="row g-4 mb-5">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Conexión Directa</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Variedad Sostenible</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Consejos Expertos</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Impacto Local</span>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-light rounded-pill py-3 px-5" href="">Ver más videos</a>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/shorts/s7T0b5LTEI8" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-white">Testimonios</p>
                <h1 class="display-6">Lo que los clientes dicen de nuestros productos</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.5s">
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">"Desde que empecé a usar los productos de EcoFert, mis cultivos han prosperado como nunca antes. Los fertilizantes orgánicos son de alta calidad y los nutrientes foliares han mejorado la salud de mis plantas. ¡Gracias EcoFert por hacer que mi tierra sea más fértil y productiva!"</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="img/testimonial-1.jpg" alt="">
                        <div class="text-start ms-3">
                            <h5>María G.</h5>
                            <span class="text-primary">Agricultora</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">"EcoFert ha sido un socio clave en mi negocio agrícola. Los nutrientes foliares de su catálogo han ayudado a maximizar la calidad y el rendimiento de mis cosechas. Sus productos son confiables y eficaces, y el equipo de soporte es excepcional."</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="img/testimonial-2.jpg" alt="">
                        <div class="text-start ms-3">
                            <h5>Pedro R.</h5>
                            <span class="text-primary">Agricultor Comercial</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">"Como dueña de un vivero, la calidad de los productos que utilizo es esencial. EcoFert ha sido mi elección constante debido a sus fertilizantes orgánicos. Mis plantas crecen más fuertes y saludables, lo que ha aumentado la satisfacción de mis clientes."</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="img/testimonial-3.jpg" alt="">
                        <div class="text-start ms-3">
                            <h5>Isabel L.</h5>
                            <span class="text-primary">Dueña de vivero</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->




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