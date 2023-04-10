<?php
// Esto es una prueba
// Código PHP para el inicio de sesión

// Conectarse a la base de datos
include "conexion.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Verificar las credenciales del usuario
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Las credenciales son válidas, iniciar sesión y guardar información del usuario en la sesión
    session_start();
    $row = mysqli_fetch_assoc($result);
    $_SESSION['usuario'] = $row['nombre'];
    $_SESSION['apellidos'] = $row['apellidos'];
    $_SESSION['email'] = $row['email'];
    header("Location: inicio.php");
} else {
    // Las credenciales son inválidas, mostrar mensaje de error
    echo "Correo electrónico o contraseña incorrectos";
}

mysqli_close($conn);
?>
