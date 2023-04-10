<?php
include 'header.php';

// Iniciar sesión
session_start();

// Conexión a la base de datos
include 'conexion.php';

// Verificar si el carrito está vacío
if(!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "<h3>El carrito está vacío</h3>";
} else {
    // Obtener los datos del usuario
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo_usuario = $_POST['correo_usuario'];
    $direccion_usuario = $_POST['direccion_usuario'];

    // Insertar la información de la orden en la base de datos
    $sql = "INSERT INTO ordenes (nombre_usuario, correo_usuario, direccion_usuario) VALUES ('$nombre_usuario', '$correo_usuario', '$direccion_usuario')";
    mysqli_query($conn, $sql);

    // Obtener el ID de la orden
    $id_orden = mysqli_insert_id($conn);

    // Insertar la información de los productos de la orden en la base de datos
    foreach($_SESSION['carrito'] as $producto) {
        $id_producto = $producto['id'];
        $cantidad_producto = $producto['cantidad'];
        $precio_producto = $producto['precio'];
        $sql = "INSERT INTO ordenes_productos (id_orden, id_producto, cantidad_producto, precio_producto) VALUES ($id_orden, $id_producto, $cantidad_producto, $precio_producto)";
        mysqli_query($conn, $sql);
    }

    // Calcular el total de la orden
    $total = 0;
    foreach($_SESSION['carrito'] as $producto) {
        $total += $producto['precio'] * $producto['cantidad']; // Calcular el total tomando en cuenta la cantidad
    }

    // Procesar el pago
    $numero_tarjeta = $_POST['numero_tarjeta'];
    $nombre_titular = $_POST['nombre_titular'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $codigo_seguridad = $_POST['codigo_seguridad'];
    $monto = $total;

    // Lógica de procesamiento de pago...

    // Actualizar la base de datos con la información del pago
    $sql = "UPDATE ordenes SET estado_pago = 'pagado', monto = $monto WHERE id = $id_orden";
    mysqli_query($conn, $sql);

    // Vaciar el carrito
    unset($_SESSION['carrito']);

    echo "<h3>Gracias por su compra</h3>";
}

mysqli_close($conn);

include 'footer.php';
?>
