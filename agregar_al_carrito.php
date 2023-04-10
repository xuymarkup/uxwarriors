<?php
// Obtener los datos del producto
$id_producto = $_POST['id_producto'];
$nombre_producto = $_POST['nombre_producto'];
$precio_producto = $_POST['precio_producto'];
$cantidad_producto = $_POST['cantidad_producto'];

// Verificar si el carrito existe en la sesión, sino crearlo
if(!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Verificar si el producto ya está en el carrito, sino agregarlo
if(isset($_SESSION['carrito'][$id_producto])) {
    $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad_producto; // Sumar la cantidad
} else {
    $_SESSION['carrito'][$id_producto] = array(
        'nombre' => $nombre_producto,
        'precio' => $precio_producto,
        'cantidad' => $cantidad_producto // Agregar la cantidad
    );
}

// Redirigir al producto
header("Location: producto.php?id={$id_producto}");
exit();
?>