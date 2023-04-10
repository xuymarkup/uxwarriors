<?php
// Incluir archivo para validar sesión
require_once "validar_sesion.php";

// Incluir header y footer
include "header.php";
?>

<!-- Contenido del perfil -->
<h1>Bienvenido <?php echo $_SESSION['usuario']; ?>!</h1>
<p>Esta es la página de tu perfil.</p>

<!-- Incluir footer -->
<?php include "footer.php"; ?>
