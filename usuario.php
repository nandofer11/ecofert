<?php

include("php/conexion.php");
session_start();

if (isset($_SESSION['datos'])) {
    $id = $_SESSION['datos']['id'];

    $query = "SELECT * FROM usuario WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);

    $datos = mysqli_fetch_array($resultado);
    $_SESSION['datos'] = $datos;

    $nombre = $_SESSION['datos']['nombreUser'];
    $apellido = $_SESSION['datos']['apellidoUser'];
    $correo = $_SESSION['datos']['correoUser'];
    $domicilio = $_SESSION['datos']['direccionUser'];
    $codigoPostal = $_SESSION['datos']['codigo_postal'];
    $ciudad = $_SESSION['datos']['ciudad'];
    $telefono = $_SESSION['datos']['telefono'];

    $ultimoCierre = $_SESSION['datos']['ultima_sesion'];
    $ultimoCierre = date("d-m-o  h:i .a", strtotime($ultimoCierre));
} else {
    header("Location: index.php");
}

if (!isset($_GET['url'])) {
    header("Location: usuario.php?url=perfil-user");
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
    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top nav_component">
        <div class="container">
            <?php require("php/navbar.php") ?>
        </div>

    </div>
    <!-- Navbar End -->

    <div class="container">
        <div class="row">
        <h1 class="mt-5 text-center display-6 mb-5">Panel de Administración</h1>
            <div class="col-12 col-sm-4">
                <div class="menu-usuario">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="usuario.php?url=perfil-user">Tu perfil</a></li>
                        <li class="list-group-item"><a href="carrito.php">Carrito de compras</a></li>
                        <li class="list-group-item"><a href="usuario.php?url=update">Actualizar datos</a></li>
                        <li class="list-group-item"><a href="usuario.php?url=compras">Historial de compras</a></li>
                        <li class="list-group-item"><a href="#">Configuración</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-8">
                <div class="contenido">
                    <div id="" class="opcionMenu">
                        <h2>Ingresar nuevo producto</h2>
                        <form action="php/insertarProducto.php" method="POST" enctype="multipart/form-data">
                            <label for="nombre">Nombre del producto:</label><br>
                            <input type="text" id="nombre" name="nombre-producto">
                            <br><br>
                            <label for="img">Imagen del producto:</label><br>
                            <input type="file" id="img" name="imagen">
                            <br><br>
                            <label for="descripcion">Descripción del producto:</label><br>
                            <textarea name="descrip-producto" id=""></textarea>
                            <br><br>
                            <label for="gramos">Peso/cantidad</label><br>
                            <input type="text" id="gramos" name="gramos-producto">
                            <br><br>
                            <label for="precio">Precio del producto:</label><br>
                            <input type="text" id="precio" name="precio-producto">
                            <br><br>
                            <label for="tipo">Tipo de producto:</label><br>
                            <input type="radio" name="tipo-producto" value="fruta">Fruta
                            <input type="radio" name="tipo-producto" value="verdura">Verdura
                            <br><br>
                            <input type="submit" value="Guardar">

                        </form>
                    </div>

                    <div id="update" class="opcionMenu">
                        <h2>Actualizar datos</h2>
                        <form action="php/updateDatos.php" method="POST">
                            <label for="nombreAdmin">Nombre:</label><br>
                            <input type="text" id="nombreAdmin" name="nombre-user" value="<?php echo $nombre ?>">
                            <br><br>
                            <label for="apellidoAdmin">Apellido:</label><br>
                            <input type="text" id="apellidoAdmin" name="apellido-user" value="<?php echo $apellido ?>">
                            <br><br>
                            <label for="emailAdmin">Correo electrónico:</label><br>
                            <input type="email" id="emailAdmin" name="correo-user" value="<?php echo $correo ?>">
                            <br><br>
                            <label for="domicilio">Dirección domicilio:</label><br>
                            <input type="text" id="domicilio" name="direccion-user" value="<?php echo $domicilio ?>">
                            <br><br>
                            <label for="postal">Código postal:</label><br>
                            <input type="text" id="postal" name="cod_postal" value="<?php echo $codigoPostal ?>">
                            <br><br>
                            <label for="ciudad">Ciudad:</label><br>
                            <input type="text" id="ciudad" name="ciudad-user" value="<?php echo $ciudad ?>">
                            <br><br>
                            <label for="telefono">Telefono/Celular:</label><br>
                            <input type="text" id="telefono" name="telefono-user" value="<?php echo $telefono ?>">
                            <br><br>
                            <input type="submit" value="Actualizar datos">
                        </form>
                    </div>

                    <div id="compras" class="opcionMenu">
                        <h2 class="title-misCompras">Mis compras</h2>
                        <table class="table-compras">
                            <tr>
                                <th>Nombre producto</th>
                                <th>Imagen</th>
                                <th>Cantidad</th>
                                <th>Fecha de compra</th>
                                <th>Total</th>
                                <th>Metodo de pago</th>
                                <th>Detalles</th>
                            </tr>
                            <?php
                            $compras = "SELECT * FROM compras WHERE id_cliente = '$id'";
                            $consulta = mysqli_query($conexion, $compras); ?>

                            <?php while ($articulos = mysqli_fetch_array($consulta)) { ?>
                                <?php
                                $idProducto = $articulos['id_producto'];
                                $querySelector = "SELECT * FROM productos WHERE id_producto = '$idProducto'";
                                $resultadoProducto = mysqli_query($conexion, $querySelector);
                                $infoProducto = mysqli_fetch_array($resultadoProducto);

                                $nombreProducto = $infoProducto['nombreProducto'];
                                $img = $infoProducto['imagenProducto'];
                                $cantidad = $articulos['cantidad'];
                                $fecha = $articulos['fecha_compra'];
                                $hora = date("h:i .a", strtotime($fecha));
                                $fecha = date("d-m-o", strtotime($fecha));
                                $precio = $articulos['precio'];
                                $total = $cantidad * $precio;
                                $total = bcdiv($total, '1', 3);
                                $metodoPago = $articulos['metodo_pago'];
                                ?>
                                <tr>
                                    <td>
                                        <p><?php echo $nombreProducto ?></p>
                                    </td>
                                    <td class="img-product"><img src="<?php echo $img ?>"></td>
                                    <td>
                                        <p><?php echo $cantidad ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $fecha ?><br><?php echo $hora ?></p>
                                    </td>
                                    <td>
                                        <p>$ <?php echo $total ?></p>
                                    </td>
                                    <td class="metodo">
                                        <p><?php echo $metodoPago ?></p><img src="imagenes/<?php echo $metodoPago ?>.png">
                                    </td>
                                    <td><a class="href-detalles" href="?url=compras&detalles_id=<?php echo $articulos['id_compra'] ?>">Ver detalles</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <div id="perfil-user" class="opcionMenu">
                        <div class="sub-contenido">
                            <img src="imagenes/user-perfil.png" alt="">
                            <p><?php echo $nombre ?> <?php echo $apellido ?></p>
                            <p>Usuario</p>
                        </div>
                        <?php
                        $cantidadCompras = "SELECT * FROM compras WHERE id_cliente = '$id'";
                        $buscar = mysqli_query($conexion, $cantidadCompras);
                        $totalCompras = mysqli_num_rows($buscar);
                        ?>
                        <div class="info-perfil">
                            <div class="info-box">
                                <p>Total de compras: <span><?php echo $totalCompras ?></span></p>
                            </div>
                            <div class="info-box">
                                <p>Ultimo cierre de sesión: <span><?php echo $ultimoCierre ?></span></p>
                            </div>
                            <div class="info-box">
                                <p>Mi correo de contacto: <span><?php echo $correo ?></span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- VENTANA EMERGENTE DETALLES COMPRA-->
    <?php
    if (isset($_GET['detalles_id'])) {
        $id_compra = $_GET['detalles_id'];
    } else {
        $id_compra = NULL;
    }

    $infoCompra = "SELECT * FROM compras WHERE id_compra = '$id_compra'";
    $compra = mysqli_query($conexion, $infoCompra);
    $propiedades = mysqli_fetch_array($compra);
    $fecha = $propiedades['fecha_compra'];
    $fecha = date("d-m-o", strtotime($fecha));
    $fecha_entrega = $propiedades['fecha_entrega'];
    $ciudad = $propiedades['ciudad'];
    $codPostal = $propiedades['codigo_postal'];
    $direcEnvio = $propiedades['domicilio'];
    $pago = $propiedades['metodo_pago'];

    ?>
    <?php if (isset($_GET['detalles_id'])) { ?>

        <div id="miModal" class="modal">
            <div class="flex" id="flex">
                <div class="contenido-modal">
                    <div class="modal-header">
                        <span class="icon-cancel-circle" id="close-alert"></span>
                        <h2>Detalles de envío</h2>
                    </div>
                    <div class="modal-body">
                        <p><b>Fecha de compra:</b> <?php echo $fecha ?></p>
                        <p><b>Destino del producto: </b><?php echo $ciudad ?></p>
                        <p><b>Código postal: </b><?php echo $codPostal ?></p>
                        <p><b>Dirección de envio: </b><?php echo $direcEnvio ?></p>
                        <p><b>Fecha de entrega: </b><?php echo $fecha_entrega ?></p>
                        <p><b>Método de pago: </b><?php echo $pago ?><span class="img-pago"><img src="imagenes/<?php echo $pago ?>.png"></span></p>
                        <p><b>Estado de pago: </b><span class="estado">¡Satisfactorio!</span></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
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
    <script src="js/urlActual.js"></script>
    <script src="js/cerrarDetalles.js"></script>
</body>

</html>