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
<html>
<head>
	<title>Mi sitio web</title>
</head>
<body>
	<header>
		<?php include "menu.php"; ?>
	</header>
