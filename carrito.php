<?php

session_start();
include("php/conexion.php");

if (isset($_SESSION['datos'])) {
    $id = $_SESSION['datos']['id'];
    $query = "SELECT * FROM carrito_compras WHERE id_usuario = '$id'";

    $consultaCarrito = $conexion->query($query);


    $ciudad = $_SESSION['datos']['ciudad'];
    $domicilio = $_SESSION['datos']['direccionUser'];
    $codigoPostal = $_SESSION['datos']['codigo_postal'];
}

$subtotal = 0;
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
    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top nav_component">
        <div class="container">
            <?php require("php/navbar.php") ?>
        </div>

    </div>
    <!-- Navbar End -->

    <div class="container">
        <h1 class="mt-5 text-center display-6 mb-5">Carrito de compras</h1>
        <!--Inicio del carrito de compras-->
        <table id="tabla-productos" class="mt-5 table table-striped">
            <tr>
                <th>Producto</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Eliminar</th>
            </tr>
            <?php if (isset($_SESSION['datos'])) {
                $id = $_SESSION['datos']['id'];
                $query = "SELECT * FROM carrito_compras WHERE id_usuario = '$id'";

                $consultaCarrito = $conexion->query($query); ?>

                <?php while ($datos = mysqli_fetch_array($consultaCarrito)) { ?>
                    <?php $producto = $datos['producto'];
                    $queryProducto = "SELECT * FROM productos WHERE id_producto = '$producto'";
                    $consultaProducto = $conexion->query($queryProducto);
                    $informacion = mysqli_fetch_array($consultaProducto);
                    $operacion = $informacion['precioProducto'] * $datos['cantidad'];
                    $data = bcdiv($operacion, '1', 2);
                    $subtotal = $subtotal + $data;

                    ?>

                    <tr>
                        <td>
                            <p><?php echo $informacion['nombreProducto'] ?></p>
                        </td>
                        <td class="table-img"><img class="img-carrito img-fluid" src="<?php echo $informacion['imagenProducto'] ?>"></td>
                        <td>
                            <p>S/. <?php echo $informacion['precioProducto'] ?></p>
                        </td>
                        <td>
                            <p><?php echo $datos['cantidad'] ?></p>
                        </td>
                        <td>
                            <p>S/. <?php echo $data ?></p>
                        <td><a href="php/quitarProducto.php?id=<?php echo $datos['id_carrito'] ?>"><img src="img/basura.png"></a></td>
                    </tr>

                <?php } ?>
            <?php } ?>
        </table>

        <div class="suptotal">
            <div class="pagos">
                <p>Formas de pago</p>
                <ul>
                    <li>Paypal | </li>
                    <li>MasterCard | </li>
                    <li>Efectivo | </li>
                    <li>PSE</li>
                </ul>
            </div>
            <?php $subtotal = number_format($subtotal, '2', '.', ',') ?>
            <div class="sup">
                <p>Subtotal : S/. <?php echo $subtotal ?></p>
            </div>
        </div>

        <div class="container botones">

            <div class="comya13">
                <a href="" id="btn-comprar" class="btn btn-danger me-3" data-bs-toggle="modal" data-bs-target="#miModal">
                    <h5>¡Compra ahora!</h5>
                </a>
            </div>



            <div class="continuarlin">
                <a href="catalogo.php" class="btn btn-primary">
                    <h5>Continuar comprando</h5>
                </a>
            </div>
        </div>

        <!--fin del carrito de compras-->
    </div>

    <!-- VENTANA EMERGENTE COMPRAR YA -->

    <div id="miModal" class="modal">
        <div class="flex" id="flex">
            <div class="contenido-modal">
                <div class="modal-header">
                    <span class="icon-cancel-circle" id="close-alert"></span>
                    <h2>INFORMACIÓN DE COMPRA</h2>
                </div>
                <div class="modal-body">
                    <form action="php/insertarCompra.php" method="POST">
                        <h3>Información de envío <p class="precioTotal">Total a pagar: S/. <?php echo $subtotal ?></p>
                        </h3>
                        <br>
                        <label for="">Ciudad: </label>
                        <input type="text" name="ciudad-envio" placeholder="Destino del producto" class="campo" value="<?php echo $ciudad ?>" required="">
                        <label for="" class="cod-postal">Código Postal:</label>
                        <input type="text" name="postal-envio" placeholder="Su código postal" class="campo" value="<?php echo $codigoPostal ?>" required=""><br>
                        <label for="">Dirección de residencia: </label>
                        <input type="text" name="direccion-envio" placeholder="Ingrese su dirección" class="campo-addres" value="<?php echo $domicilio ?>" required=""><br>

                        <?php
                        date_default_timezone_set("America/Bogota");

                        include("php/fechaEspañol.php");
                        $d = date("d") + 3;
                        $m = date("m");

                        $time = "$d-$m-2019";

                        $resultado = fechaEspañol($time);

                        ?>
                        <br><br>
                        <p><span class="icon-airplane"></span><span class="tiempo">El envío llegará:</span><input type="text" name="fechaEntrega" readonly="readonly" value="<?php echo $resultado ?>" class="inputFecha"></p>

                        <div class="linea-separadora"></div>
                        <h3>Método de pago</h3>
                        <ul>
                            <li><input type="radio" name="metodo-pago" value="mastercard" checked=""><img src="img/mastercard.png"></li>
                            <li><input type="radio" name="metodo-pago" value="paypal"><img src="img/paypal.png"></li>
                            <li><input type="radio" name="metodo-pago" value="visa"><img src="img/visa.png"></li>
                            <li><input type="radio" name="metodo-pago" value="bitcoin"><img src="img/bitcoin.png"></li>
                            <li><input type="radio" name="metodo-pago" value="payment"><img src="img/payment.png"></li>
                        </ul>
                        <input type="submit" value="COMPRAR">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN VENTANA EMERGENTE -->

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

    <!-- <script src="js/buscar.js"></script> -->
    <!-- <script src="js/ventanaComprar.js"></script> -->
    <script src="js/aparecerIcono.js"></script>

    <!-- JavaScript Libraries -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
</body>

</html>