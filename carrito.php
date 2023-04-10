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
}

// Botón para vaciar el carrito
echo "<form method='POST' action='vaciar_carrito.php'>";
echo "<input type='submit' value='Vaciar carrito'>";
echo "</form>";
?>

<!-- Botón para ir a la página de pago -->
<form method="POST" action="pago.php">
    <input type="submit" value="Ir a pagar">
</form>
<?php
    include 'footer.php';
?>
