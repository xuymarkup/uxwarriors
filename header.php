<?php
session_start();
//TODO validar esta sesion en el archivo validar sesion
// Verifica si hay una sesión iniciada
if (!isset($_SESSION['usuario'])) {
    // Si no hay sesión iniciada, redirige al usuario a la página de inicio de sesión
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Linea</title>
</head>
<html>
<body>
	<header>
		<?php include "menu.php"; ?>
	</header>
