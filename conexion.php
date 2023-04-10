<?php

$archivo = __DIR__ . "/config.ini";

$contenido = parse_ini_file($archivo, true);

$DB_HOST = $contenido["DB_HOST"];
$DB_USER = $contenido["DB_USER"];
$DB_PASS = $contenido["DB_PASS"];
$DB_NAME = $contenido["DB_NAME"];

$servername = $DB_HOST;
$username = $DB_USER;
$password = $DB_PASS; 
$dbname = $DB_NAME;

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
