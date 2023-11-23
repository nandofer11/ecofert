<?php
// session_start();
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

<?php
// session_start();
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
    $tipo = 'organicos';
}

if (isset($_GET['rango'])) {
    echo $_GET['rango'];
}

$query = "SELECT * FROM productos WHERE tipo = '$tipo'";
$resultado = $conexion->query($query);

?>

<?php
$currentPage = basename($_SERVER['PHP_SELF']); // Obtiene el nombre del archivo actual

function isActivePage($page, $currentPage) {
    return $page === $currentPage ? 'active' : '';
}
?>

<nav class="navbar navbar-expand-lg navbar-light py-2 py-lg-0">
    <a href="index.php" class="navbar-brand">
        <img class="img-fluid" src="img/_logo.png" alt="Logo">
    </a>
    <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto">

            <?php
            if (empty($_SESSION['datos'])) { ?>

                <!-- <a href="index.php" class="nav-item nav-link active">Inicio</a>
                <a href="empresa.php" class="nav-item nav-link">Empresa</a>
                <a href="catalogo.php" class="nav-item nav-link">Catálogo</a>
                <a href="contacto.php" class="nav-item nav-link">Contacto</a>
                <a href="noticias.php" class="nav-item nav-link">Noticias</a>
                <a href="inicio.php" class="nav-item nav-link btn-login">Ingresar</a>
                <a href="registro.php" class="nav-item nav-link">Registrarse</a> -->
                <a href="index.php" class="nav-item nav-link <?php echo isActivePage('index.php', $currentPage); ?>">Inicio</a>
                <a href="empresa.php" class="nav-item nav-link <?php echo isActivePage('empresa.php', $currentPage); ?>">Empresa</a>
                <a href="catalogo.php" class="nav-item nav-link <?php echo isActivePage('catalogo.php', $currentPage); ?>">Catálogo</a>
                <a href="noticias.php" class="nav-item nav-link <?php echo isActivePage('noticias.php', $currentPage); ?>">Noticias</a>
                <a href="contacto.php" class="nav-item nav-link <?php echo isActivePage('contacto.php', $currentPage); ?>">Contacto</a>
                <a href="inicio.php" class="nav-item nav-link <?php echo isActivePage('inicio.php', $currentPage); ?>">Ingresar</a>
                <a href="registro.php" class="nav-item nav-link <?php echo isActivePage('registro.php', $currentPage); ?>">Registrarse</a>

            <?php } else { ?>
                <a href="index.php" class="nav-item nav-link <?php echo isActivePage('index.php', $currentPage); ?>">Inicio</a>
                <a href="empresa.php" class="nav-item nav-link <?php echo isActivePage('empresa.php', $currentPage); ?>">Empresa</a>
                <a href="catalogo.php" class="nav-item nav-link <?php echo isActivePage('catalogo.php', $currentPage); ?>">Catálogo</a>
                <a href="noticias.php" class="nav-item nav-link <?php echo isActivePage('noticias.php', $currentPage); ?>">Noticias</a>                
                <a href="contacto.php" class="nav-item nav-link <?php echo isActivePage('contacto.php', $currentPage); ?>">Contacto</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="img/usuario.png" width="36px" alt="">
                    </a>
                    <div class="dropdown-menu">
                        <a href="php/validarUsuario.php" class="dropdown-item">Perfil</a>
                        <a href="php/cerrar.php" class="dropdown-item">Cerrar sesión</a>
                    </div>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['objetoNoEncontrado'])) { ?>
                <h3 class="errorBusqueda" id="messageError"><?php echo $_SESSION['objetoNoEncontrado'] ?></h3>
            <?php unset($_SESSION['objetoNoEncontrado']);
            } ?>

        </div>

        <div class="border-start ps-4 d-none d-lg-block">
            <a href="carrito.php" type="button" class="btn btn-sm p-0"><i class="fas fa-shopping-cart fa-2x"></i></a>
            <span class="cantidad"><?php echo $cantidad ?></span>
        </div>
    </div>
</nav>