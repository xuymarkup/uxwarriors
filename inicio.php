<?php include 'header.php'; ?>



<main>
	<h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
	<p>Esta es la página de inicio de mi sitio web.</p>
	<p>Tus datos:</p>
	<ul>
		<li>Nombre: <?php echo $_SESSION['usuario']; ?></li>
		<li>Apellidos: <?php echo $_SESSION['apellidos']; ?></li>
		<li>Correo electrónico: <?php echo $_SESSION['email']; ?></li>
	</ul>
    <?php include 'productos.php'; ?>
</main>



<?php include 'footer.php'; ?>
