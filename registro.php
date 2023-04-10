<?php
include "conexion.php";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario de registro
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$password = $_POST["password"];

// Verificar si el correo electrónico ya está en uso
$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "El correo electrónico ya está en uso";
} else {
    // Insertar los datos del usuario en la tabla "usuarios"
    $sql = "INSERT INTO usuarios (nombre, apellidos,email, password)
    VALUES ('$nombre','$apellidos', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
