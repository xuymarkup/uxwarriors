<?php
include 'header.php';

// Conexión a la base de datos
include 'conexion.php';

// Obtener el ID del producto de la URL
$id_producto = $_GET['id'];

// Consulta a la base de datos para obtener el producto con el ID especificado
$sql = "SELECT * FROM productos WHERE id = $id_producto";
$resultado = mysqli_query($conn, $sql);
$fila = mysqli_fetch_assoc($resultado);

// Imprimir la información del producto
echo "<h2>{$fila['nombre']}</h2>";
echo "<p>{$fila['descripcion']}</p>";
echo "<p>Precio: {$fila['precio']}</p>";
echo "<p>SKU: {$fila['sku']}</p>";
echo "<img src='{$fila['imagen']}' alt='{$fila['nombre']}' />";

echo '<pre>'; print_r( $_SESSION['carrito']); echo '</pre>';

mysqli_close($conn);
?>
<form method="POST" action="agregar_al_carrito.php">
    <input type="hidden" name="id_producto" value="<?php echo $fila['id']; ?>">
    <input type="hidden" name="nombre_producto" value="<?php echo $fila['nombre']; ?>">
    <input type="hidden" name="precio_producto" value="<?php echo $fila['precio']; ?>">
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad_producto" value="1" min="1">
    <input type="submit" value="Agregar al carrito">
</form>

<?php
include 'footer.php';
?>
