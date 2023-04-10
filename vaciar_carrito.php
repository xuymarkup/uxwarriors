<?php
session_start();

// vaciar el carrito
$_SESSION["carrito"] = array();

// redirigir a la página del carrito
header("Location: carrito.php");
exit();
?>
