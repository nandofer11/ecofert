<?php

session_start();
include("php/conexion.php");

if (isset($_SESSION['datos'])) {
    $usuario = $_SESSION['datos']['rango'];
    $admitido = "admin";
    if ($usuario == $admitido) {
        // Si es admin
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

if (isset($_GET['id']) and isset($_GET['url'])) {
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Administrador | EcoFert</title>
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
    <div class="container-fluid bg-green sticky-top">
        <div class="container">
            <?php require("php/navbar.php") ?>
        </div>

    </div>
    <!-- Navbar End -->

    <!-- Dashboard Start -->
    <div class="container">
        <div class="row">
            <h1 class="mt-5 text-center display-6 mb-5">Panel de Administración</h1>
            <div class="col-12 col-sm-4">
                <div class="menu-adminstrador">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#" class="optionA" value="">Tu perfil</a></li>
                        <li class="list-group-item"><a href="administrador.php?url=nuevoProducto" class="optionA">Ingresar nuevo producto</a></li>
                        <li class="list-group-item"><a href="administrador.php?url=nuevoAdmin" class="optionA">Agregar nuevo administrador</a></li>
                        <li class="list-group-item"><a href="administrador.php?url=listaUsuarios" class="optionA">Lista de clientes</a></li>
                        <li class="list-group-item"><a href="administrador.php?url=listaProductos" class="optionA">Lista de productos</a></li>
                        <li class="list-group-item"><a href="administrador.php?url=listaVentas" class="optionA">Historial de ventas</a></li>
                        <li class="list-group-item"><a href="administrador.php?url=envios" class="optionA">Envios</a></li>
                        <li class="list-group-item"><a href="#" class="optionA" value="">Quejas o sugerencias</a></li>
                        <li class="list-group-item"><a href="#" class="optionA" value="">Configuración</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-8">
                <div class="contenido">
                    <div id="nuevoProducto" class="opcionMenu">
                        <h2>Ingresar nuevo producto</h2>
                        <form action="php/registrarProducto.php" method="POST" enctype="multipart/form-data">
                            <label for="nombre">Nombre del producto:</label><br>
                            <input type="text" id="nombre" name="nombre-producto" class="form-control">
                            <br><br>
                            <label for="img">Imagen del producto:</label><br>
                            <input type="file" id="img" name="imagen" class="form-control">
                            <br><br>
                            <label for="descripcion">Descripción del producto:</label><br>
                            <textarea name="descrip-producto" id="" class="form-control"></textarea>
                            <br><br>
                            <label for="gramos">Peso/cantidad</label><br>
                            <input class="form-control" type="text" id="gramos" name="gramos-producto">
                            <br><br>
                            <label for="precio">Precio del producto:</label><br>
                            <input class="form-control" type="text" id="precio" name="precio-producto">
                            <br><br>
                            <label for="tipo">Tipo de producto:</label><br>
                            <input class="form-check-input" type="radio" name="tipo-producto" value="organicos"> Fertilizate Orgánico
                            <input class="form-check-input" type="radio" name="tipo-producto" value="nutrientes"> Nutriente Foliares
                            <br><br>
                            <input type="submit" class="btn btn-primary rounded-pill py-3 px-5" value="Registrar"></input>
                            
                        </form>
                    </div>

                    <div id="nuevoAdmin" class="opcionMenu">
                        <h2>Agregar un nuevo Administrador</h2>
                        <form action="php/insertarNewAdmin.php" method="POST">
                            <label for="nombreAdmin">Nombre:</label><br>
                            <input type="text" id="nombreAdmin" name="nombre-admin">
                            <br><br>
                            <label for="apellidoAdmin">Apellido:</label><br>
                            <input type="text" id="apellidoAdmin" name="apellido-admin">
                            <br><br>
                            <label for="emailAdmin">Correo electrónico:</label><br>
                            <input type="email" id="emailAdmin" name="correo-admin">
                            <br><br>
                            <label for="password">Contraseña:</label><br>
                            <input type="password" id="password" name="clave-admin">
                            <br><br>
                            <label for="domicilio">Dirección domicilio:</label><br>
                            <input type="text" id="domicilio" name="direccion-admin">
                            <br><br>
                            <label for="ciudad">Ciudad:</label><br>
                            <input type="text" id="ciudad" name="ciudad-admin">
                            <br><br>
                            <label for="telefono">Telefono/Celular:</label><br>
                            <input type="text" id="telefono" name="telefono-admin">
                            <br><br>
                            <input type="submit" value="Agregar como administrador">
                        </form>
                    </div>

                    <div id="listaUsuarios" class="opcionMenu">
                        <p class="mb-4 fs-4 animated zoomIn">Listado de clientes</p>
                        <table id="table" class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Domicilio</th>
                                <th>Ciudad</th>
                                <th>Teléfono</th>
                                <th>Rango</th>
                                <th>Eliminar</th>
                            </tr>
                            <?php
                            $consultaUser = "SELECT * FROM usuario";
                            $resultadoUser = $conexion->query($consultaUser);

                            while ($datos = mysqli_fetch_array($resultadoUser)) { ?>
                                <tr>
                                    <td>
                                        <p><?php echo $datos['id'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $datos['nombreUser'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $datos['apellidoUser'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $datos['correoUser'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $datos['direccionUser'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $datos['ciudad'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $datos['telefono'] ?>
                                    </td>
                                    <td>
                                        <p><?php echo $datos['rango'] ?></p>
                                    </td>
                                    <td><a href="php/deleteUser.php?id=<?php echo $datos['id'] ?>"><img src="img/basura.png"></a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <div id="listaProductos" class="opcionMenu">
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Descripción</th>
                                <th>Peso/cantidad</th>
                                <th>Precio</th>
                                <th>Tipo</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                            <?php
                            $query = "SELECT * FROM productos";
                            $resultado = $conexion->query($query);

                            while ($columna = mysqli_fetch_array($resultado)) { ?>
                                <tr>
                                    <td>
                                        <p><?php echo $columna['id_producto'] ?>
                                    </td>
                                    <td>
                                        <p><?php echo $columna['nombreProducto'] ?></p>
                                    </td>
                                    <td class="table-img"><img class="img-fluid" src="<?php echo $columna['imagenProducto'] ?>"></td>
                                    <td>
                                        <p><?php echo $columna['descripcionProducto'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $columna['gramosProducto'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $columna['precioProducto'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $columna['tipo'] ?></p>
                                    </td>
                                    <td><a href="php/deleteproducto.php?id=<?php echo $columna['id_producto'] ?>"><img src="img/basura.png"></a></td>
                                    <td><a href="administrador.php?url=listaProductos&id_producto=<?php echo $columna['id_producto'] ?>"><img src="img/edit.png"></a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <div id="listaVentas" class="opcionMenu">
                        <?php
                        $consultaCompras = "SELECT * FROM compras";
                        $ventas = mysqli_query($conexion, $consultaCompras);
                        ?>
                        <?php while ($compra = mysqli_fetch_array($ventas)) { ?>
                            <?php
                            $identificacionCliente = $compra['id_cliente'];
                            $queryCliente = "SELECT * FROM usuario WHERE id = '$identificacionCliente'";
                            $buscarCliente = mysqli_query($conexion, $queryCliente);
                            $datosCliente = mysqli_fetch_array($buscarCliente);

                            $identificacionProducto = $compra['id_producto'];
                            $queryProducto = "SELECT * FROM productos WHERE id_producto = '$identificacionProducto'";
                            $buscarProducto = mysqli_query($conexion, $queryProducto);
                            $datosProducto = mysqli_fetch_array($buscarProducto);

                            $id_compra = $compra['id_compra'];
                            $fecha = $compra['fecha_compra'];
                            $fecha = date("d-m-o", strtotime($fecha));
                            $estadoEnvio = $compra['estadoEnvio'];
                            $nombreCliente = $datosCliente['nombreUser'];
                            $apellidoCliente = $datosCliente['apellidoUser'];
                            $correoCliente = $datosCliente['correoUser'];
                            $telefonoCliente = $datosCliente['telefono'];
                            $nombreProducto = $datosProducto['nombreProducto'];
                            $imgProduct = $datosProducto['imagenProducto'];
                            $cantidad = $compra['cantidad'];
                            $precio = $compra['precio'];
                            $total = bcdiv(($cantidad * $precio), '1', 3);
                            $metodoPago = $compra['metodo_pago'];
                            $ciudadEnvio = $compra['ciudad'];
                            $codPostal = $compra['codigo_postal'];
                            $direccionEnvio = $compra['domicilio'];
                            ?>
                            <a name="venta<?php echo $compra['id_compra'] ?>"></a>
                            <div class="card-venta" data-value="<?php echo $estadoEnvio ?>">
                                <div class="header-card">
                                    <p><b>FECHA DE VENTA:</b> <em><?php echo $fecha ?></em></p>
                                </div>
                                <div class="infoUser-card">
                                    <h3>Información del cliente</h3>
                                    <p><b>Nombre: </b><?php echo $nombreCliente ?> <?php echo $apellidoCliente ?></p>
                                    <p><b>Correo: </b><?php echo $correoCliente ?></p>
                                    <p><b>Telefono/Celular: </b><?php echo $telefonoCliente ?></p>
                                </div>
                                <div class="infoEnvio-card">
                                    <h3>Información de envio</h3>
                                    <p><b>Ciudad: </b><?php echo $ciudadEnvio ?></p>
                                    <p><b>Código postal: </b><?php echo $codPostal ?></p>
                                    <p><b>Dirección: </b><?php echo $direccionEnvio ?></p>
                                </div>
                                <div class="infoProduct-card">
                                    <h3>Información del producto</h3>
                                    <img class="img-producto" src="<?php echo $imgProduct ?>">
                                    <p><b>Referencia: </b><?php echo $nombreProducto ?></p>
                                    <p><b>Cantidad: </b><?php echo $cantidad ?></p>
                                    <p><b>Total: </b>$ <?php echo $total ?></p>
                                    <p><b>Metodo de pago</b></p>
                                    <img src="imagenes/<?php echo $metodoPago ?>.png">
                                </div>
                                <br>
                                <div class="linea-separadora"></div>
                                <br>
                                <div class="estado-envio">
                                    <div class="linea-1">
                                        <div class="bola-1">
                                            <p>Envio en proceso</p>
                                        </div>
                                    </div>
                                    <div class="linea-2">
                                        <div class="bola-2">
                                            <p>Producto en camino</p>
                                        </div>
                                        <div class="bola-3">
                                            <p>Producto entregado</p>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br><br>
                            </div>
                        <?php } ?>
                    </div>

                    <div id="envios" class="opcionMenu">
                        <table class="table-estadoEnvios table table-striped">
                            <tr>
                                <th>Id Compra</th>
                                <th>Fecha de compra</th>
                                <th>Fecha de entrega</th>
                                <th>Estado de envio</th>
                                <th style="border-left: 2px #C7C7C7 solid;">Cambiar estado</th>
                            </tr>
                            <?php
                            $totalCompras = "SELECT * FROM compras";
                            $queryCompras = mysqli_query($conexion, $totalCompras);
                            ?>
                            <?php while ($informacionCompras = mysqli_fetch_array($queryCompras)) {
                                $fechaCompra = $informacionCompras['fecha_compra'];
                                $fechaCompra = date("d-m-o", strtotime($informacionCompras['fecha_compra'])) ?>
                                <tr>
                                    <td><a href="administrador.php?url=listaVentas#venta<?php echo $informacionCompras['id_compra'] ?>"><?php echo $informacionCompras['id_compra'] ?></a></td>
                                    <td><?php echo $fechaCompra ?></td>
                                    <td><?php echo $informacionCompras['fecha_entrega'] ?></td>
                                    <td class="valueEstado"><?php echo $informacionCompras['estadoEnvio'] ?></td>
                                    <td style="border-left: 2px #C7C7C7 solid; position: relative;">
                                        <form action="php/cambiarEstadoEnvio.php?id=<?php echo $informacionCompras['id_compra'] ?>" method="POST" class="estadosDeEnvio" name="form-cambiarEstadosEnvio">
                                            <input type="radio" name="estado-de-envio" value="Pendiente" id="productoPendiente<?php echo $informacionCompras['id_compra'] ?>"><label for="productoPendiente<?php echo $informacionCompras['id_compra'] ?>"><img src="imagenes/pendiente.png" title="Pendiente"></label>
                                            <input type="radio" name="estado-de-envio" value="En camino" id="enCamino<?php echo $informacionCompras['id_compra'] ?>"><label for="enCamino<?php echo $informacionCompras['id_compra'] ?>"><img src="imagenes/camino.png" title="En camino"></label>
                                            <input type="radio" name="estado-de-envio" value="Entregado" id="productoRecibido<?php echo $informacionCompras['id_compra'] ?>"><label for="productoRecibido<?php echo $informacionCompras['id_compra'] ?>"><img src="imagenes/entregado.png" title="Entregado"></label>
                                            <button><img src="imagenes/comprobado.png"></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard End -->

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

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/urlActual.js"></script>
</body>

</html>