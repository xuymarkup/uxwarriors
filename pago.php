<?php
//include 'header.php';

session_start();

// Si no hay productos en el carrito, redirige al inicio
if (empty($_SESSION['carrito'])) {
    header("Location: inicio.php");
    exit();
}

// Calcula el total de la compra
$total = 0;
foreach ($_SESSION['carrito'] as $producto) {
    $total += $producto['precio'];
}

// Procesa el pago cuando se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nombre = $_POST["nombre"];
    $tarjeta = $_POST["tarjeta"];
    $fecha = $_POST["fecha"];
    $cvv = $_POST["cvv"];
    
    // Aquí puedes agregar código para validar los datos del formulario
    
    // Realiza el pago (aquí puedes agregar código para procesar el pago con una API de pago)
    $pago_exitoso = true;
    
    // Si el pago fue exitoso, redirige a la página de confirmación
    if ($pago_exitoso) {
        // Aquí puedes agregar código para actualizar el inventario de los productos y registrar la venta
        $_SESSION['carrito'] = array(); // Limpia el carrito
        header("Location: confirmacion.php");
        exit();
    }
    // Si el pago no fue exitoso, muestra un mensaje de error
    else {
        $error_pago = "Error: no se pudo procesar el pago. Intente de nuevo más tarde.";
    }
}

// Cerrar la sesión de base de datos
mysqli_close($conn);
?>

<!-- Código HTML para la página de pago -->
<main>
    <h1>Carrito de compras</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['carrito'] as $producto): ?>
                <tr>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td><strong>Total:</strong></td>
                <td><?php echo $total; ?></td>
            </tr>
        </tbody>
    </table>
    
    <h2>Pago</h2>
    <?php if (isset($error_pago)): ?>
        <p><?php echo $error_pago; ?></p>
    <?php endif; ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre en la tarjeta:</label>
        <input type="text" name="nombre" required><br>
        <label for="tarjeta">Número de tarjeta:</label>
        <input type="text" name="tarjeta" required><br>
        <label for="fecha">Fecha de expiración:</label>
        <input type="text" name="fecha" required><br>
        <label for="cvv">CVV:</label>
        <input type="text" name="cvv" required><br>
        <input type="submit" value="Realizar pago">
    </form>
</main>
<?php
    include 'footer.php';
?>  