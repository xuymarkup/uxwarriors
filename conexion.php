<?php

$archivo = __DIR__ . "/config.ini";

$contenido = parse_ini_file($archivo, true);

$DB_HOST = $contenido["DB_HOST"];

$servername = $DB_HOST;
$username = "tiendac2_test";
$password = "password_db@";
$dbname = "tiendac2_test";

// $servername = getenv('DB_HOST');
// $username = getenv('DB_USER');
// $password = getenv('DB_PASS');
// $dbname = getenv('DB_NAME');

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
