<?php
// Código PHP para el formulario de contacto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesa el formulario cuando se envía
    
    // Obtiene los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];
    
    // Aquí puedes agregar código para validar los datos del formulario
    
    // Enviar correo electrónico con los datos del formulario
    $destinatario = "destinatario@example.com";
    $contenido = "Nombre: $nombre \nEmail: $email \nAsunto: $asunto \nMensaje: $mensaje";
    $headers = "From: $email";
    mail($destinatario, $asunto, $contenido, $headers);
    
    // Redirige a la página de confirmación
    header("Location: confirmacion.php");
    exit();
}
?>

<!-- Código HTML para el formulario de contacto -->
<h1>Contacto</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" required><br>
    <label for="asunto">Asunto:</label>
    <input type="text" name="asunto" required><br>
    <label for="mensaje">Mensaje:</label>
    <textarea name="mensaje" required></textarea><br>
    <input type="submit" value="Enviar">
</form>
