<?php
$archivo = __DIR__ . "/config.ini";

$contenido = parse_ini_file($archivo, true);

echo var_export($contenido, true);
$pagina_inicio = $contenido["DB_HOST"];
echo "La página de inicio es: $pagina_inicio";
?>