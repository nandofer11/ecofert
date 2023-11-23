<?php
session_start();
include("conexion.php");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['datos'])) {
    header("Location: ../login.php");
    $_SESSION['loginCarrito'] = "Debes ingresar con tu cuenta para acceder al carrito de compras";
    exit(); // Asegura que el código se detenga aquí si no ha iniciado sesión
}

// Resto del código para añadir al carrito
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
}

$id_usuario = $_SESSION['datos']['id'];
$cantidad = $_POST['cantidadTotal'];

// Verificar si el producto ya está en el carrito
$query_verificar = "SELECT * FROM carrito_compras WHERE id_usuario = '$id_usuario' AND producto = '$id_producto'";
$resultado_verificar = $conexion->query($query_verificar);

if (mysqli_num_rows($resultado_verificar) > 0) {
    // Si el producto ya está en el carrito, actualiza la cantidad
    $fila = mysqli_fetch_assoc($resultado_verificar);
    $nueva_cantidad = $fila['cantidad'] + $cantidad;

    $query_actualizar = "UPDATE carrito_compras SET cantidad = '$nueva_cantidad' WHERE id_usuario = '$id_usuario' AND producto = '$id_producto'";
    $resultado_actualizar = $conexion->query($query_actualizar);

    if (!$resultado_actualizar) {
        echo "Error al actualizar la cantidad en el carrito.";
    }
} else {
    // Si el producto no está en el carrito, inserta un nuevo registro
    $query_insertar = "INSERT INTO carrito_compras (id_usuario, producto, cantidad) 
                        VALUES ('$id_usuario', '$id_producto', '$cantidad')";
    $resultado_insertar = $conexion->query($query_insertar);

    if (!$resultado_insertar) {
        echo "Error al agregar el producto al carrito.";
    }
}

header("Location: ../carrito.php");
?>
