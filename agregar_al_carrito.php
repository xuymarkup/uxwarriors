<?php
// Iniciar sesión
session_start();

// Obtener los datos del producto
$id_producto = $_POST['id_producto'];
$nombre_producto = $_POST['nombre_producto'];
$precio_producto = $_POST['precio_producto'];
$cantidad_producto = $_POST['cantidad_producto'];

// Verificar si el carrito ya existe, si no crearlo
if(!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Verificar si el producto ya existe en el carrito
if(isset($_SESSION['carrito'][$id_producto])) {
    // Si existe, sumar la cantidad
    $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad_producto;
} else {
    // Si no existe, agregar el producto al carrito
    $_SESSION['carrito'][$id_producto] = array(
        'id' => $id_producto,
        'nombre' => $nombre_producto,
        'precio' => $precio_producto,
        'cantidad' => $cantidad_producto
    );
}

// Redirigir al usuario al carrito de compras
header("Location: carrito.php");
?>
