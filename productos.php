<?php
// Conexión a la base de datos
include 'conexion.php';

// Consulta a la base de datos para obtener los productos
$sql = "SELECT * FROM productos";
$resultado = mysqli_query($conn, $sql);

// Imprimir los productos en una lista
echo "<h2>Productos:</h2>";
echo "<ul>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<li><a href='producto.php?id={$fila['id']}'>{$fila['nombre']}</a> - {$fila['precio']}</li>";
    echo "<img src='https://source.unsplash.com/random/800x600/?nature' alt='{$fila['nombre']}'></li>";
}
echo "</ul>";

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
