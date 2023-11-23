<?php
session_start();
sleep(1);
include("conexion.php");

$correo = $_POST['emailUser'];
$clave = $_POST['clave'];

$query = "SELECT * FROM usuario WHERE correoUser='$correo' 
									AND   contraseñaUser='$clave'";

$resultado = $conexion->query($query);
$informacion = mysqli_fetch_array($resultado);

$mensaje = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Credenciales incorrectos!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';


if (mysqli_num_rows($resultado) >= 1) {
	$_SESSION['datos'] = $informacion;

	$usuario = $_SESSION['datos']['rango'];

	header("Location: ../index.php");
} else {
	$_SESSION['mensaje'] = $mensaje;
	header("Location: ../inicio.php");
}
