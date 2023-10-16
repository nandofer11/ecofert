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

if (isset($conexion)) {
    echo "";
} else {
    echo "Error";
}

if (isset($_GET['id'])) {
    $tipo = $_GET['id'];
} else {
    $tipo = 'fruta';
}

if (isset($_GET['rango'])) {
    echo $_GET['rango'];
}

$query = "SELECT * FROM productos WHERE tipo = '$tipo'";
$resultado = $conexion->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Catálogo | EcoFert</title>
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

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Catálogo</h1>

        </div>
    </div>
    <!-- Page Header End -->

    <!-- Products Start -->
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="menu-lateral">
                    <nav class="submenu-lateral">
                        <div class="card mb-3" style="width: 18rem;">
                            <div class="card-header">
                                Categoria
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span><img src="img/icon-fruta.png"></span><a href="catalogo.php?id=organicos">Ferti. Orgánicos</a></li>
                                <li class="list-group-item"><span><img src="img/icon-verdura.png"></span><a href="catalogo.php?id=nutrientes">Nutrientes Foliares</a></li>
                            </ul>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Rango de precios
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><input class="form-check-input" type="radio" name="precio" id="no-rango" checked="" value="no-rango"><label for="no-rango"> Fuera de rango de precios</label></li>
                                <li class="list-group-item"><input class="form-check-input" type="radio" name="precio" id="1-4" value="5-99"><label for="1-4">S/. 5 - 99</label></li>
                                <li class="list-group-item"><input class="form-check-input" type="radio" name="precio" id="5-9" value="100-299"><label for="5-9">S/. 100 - 299</label></li>
                                <li class="list-group-item"><input class="form-check-input" type="radio" name="precio" id="10-14" value="300-599"><label for="10-14">S/. 300 - 599</label></li>
                                <li class="list-group-item"><input class="form-check-input" type="radio" name="precio" id="15-19" value="600-899"><label for="15-19">S/. 600 - 899</label></li>
                                <li class="list-group-item"><input class="form-check-input" type="radio" name="precio" id="20-24" value="900-1500"><label for="20-24">S/. 900 - 1500</label></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-8">
                <div class="contenido-productos">
                    <?php
                    while ($columna = mysqli_fetch_array($resultado)) { ?>
                        <div class='card'>
                            <img src="<?php echo $columna['imagenProducto'] ?>">
                            <h2><?php echo $columna['nombreProducto'] ?></h2>
                            <p><em><?php echo $columna['gramosProducto'] ?></em></p><br>
                            <h3 value="<?php echo $columna['precioProducto'] ?>">Precio: $ <?php echo $columna['precioProducto'] ?></h3><br>
                            <button><a href="descripcion.php?id=<?php echo $columna['id_producto'] ?>">Ver más</a></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Products End -->



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
    <script src="js/rangoPrecios.js"></script>
    <script src="js/aparecerIcono.js"></script>
    <script src="js/submenu.js"></script>
</body>

</html>