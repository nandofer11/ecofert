<?php


include("php/conexion.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM productos WHERE id_producto = '$id'";

    $resultado = $conexion->query($query);

    $columna = mysqli_fetch_array($resultado);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Descripción producto</title>
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
     <!-- Navbar Start -->
     <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <?php require("php/navbar.php") ?>
        </div>

    </div>
    <!-- Navbar End -->

    <!-- Page Header End -->

    <div class="container">
        <div class="row">
        <h1 class="mt-5 text-center display-6 mb-5">Descripción del producto</h1>
            <div class="col">
            <div id="imgdescripcion">
                <img src="<?php echo $columna['imagenProducto'] ?>" style="width: 48%; height:100%;" alt="">
            </div>
            </div>
            <div class="col">
            <div class="datos12">
                <h3><?php echo $columna['nombreProducto'] ?></h3>
                <div class="descipcion_producto">
            <div class="des1">
                <h5>Descripción del producto</h5>
                <p><?php echo $columna['descripcionProducto'] ?></p>
            </div>

        </div>
                <h5>Precio : $ <?php echo $columna['precioProducto'] ?></h5>
                <form action="php/añadirAlCarrito.php?id=<?php echo $columna['id_producto'] ?>" method="POST">
                    <div class="posicion123">
                        <div class="boton123" id="menos"><a>-</a></div>

                        <input type="number" class="cantidad12" id="cantidad" name="cantidadTotal" value="1" min="1" max="1000">

                        <div class="boton123" id="mas"><a>+</a></div>
                    </div>


                    <div class="añadir12">
                        <input type="submit" value="Añadir al carrito"><a href=""></a>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- <div>
        <div class="rank">
            <div class="espacio12">
                <h4>Valoraciones</h4>
            </div>
            <div class="progress">
                <h6>reputación</h6>
                <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
            </div>
            <div class="progress">
                <h6>Brinda buena atencion</h6>
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
            </div>
            <div class="progress">
                <h6>Entrega a tiempo</h6>
                <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
            </div>

        </div>
    </div> -->
    <!--fin de la descripcion-->

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


    <script src="js/buscar.js"></script>
    <script src="js/cantidad.js"></script>
    <script src="js/aparecerIcono.js"></script>
</body>

</html>