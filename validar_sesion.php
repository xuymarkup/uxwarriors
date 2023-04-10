<?php
// Conectarse a la base de datos
//TODO validar este archivo que no sirve en header
include "conexion.php";

function validar_sesion() {
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
  }

  // Verificar si existe una sesión activa
  session_start();
  if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // La sesión es válida
      return true;
      echo "si esta activa";
    }
  }

  // La sesión no es válida
  return false;
}
?>
