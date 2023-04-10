<?php
include 'header.php';

// Iniciar sesión
session_start();

// Verificar si el carrito está vacío
if(!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "<h3>El carrito está vacío</h3>";
} else {
    // Mostrar los productos del carrito
    echo "<h2>Carrito de compras</h2>";
    echo "<ul>";
    $total = 0;
    foreach($_SESSION['carrito'] as $producto) {
        echo "<li>{$producto['nombre']} - Precio: {$producto['precio']} - Cantidad: {$producto['cantidad']}</li>";
        $total += $producto['precio'] * $producto['cantidad']; // Calcular el total tomando en cuenta la cantidad
    }
    echo "</ul>";

    // Mostrar el total del carrito
    echo "<p>Total del carrito: $ {$total}</p>";

    // Formulario para ingresar la información de envío y pago
    echo "<h2>Información de envío y pago</h2>";
    echo "<form method='POST' action='procesar_pago.php'>";
    echo "<label for='nombre'>Nombre:</label>";
    echo "<input type='text' name='nombre' required>";
    echo "<br>";
    echo "<label for='direccion'>Dirección:</label>";
    echo "<input type='text' name='direccion' required>";
    echo "<br>";
    echo "<label for='tarjeta'>Tarjeta de crédito:</label>";
    echo "<input type='text' name='tarjeta' required>";
    echo "<br>";
    echo "<input type='submit' value='Procesar pago'>";
    echo "</form>";
}

// Botón para vaciar el carrito
echo "<form method='POST' action='vaciar_carrito.php'>";
echo "<input type='submit' value='Vaciar carrito'>";
echo "</form>";

include 'footer.php';
?>