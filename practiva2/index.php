<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | Sistema Facturación</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<section id="container">
		<form action="validarLogin.php" method="post">
			<h3>Iniciar Sesión</h3>
			<img src="user.png" alt="Login">

			<input type="text" name="usuario" placeholder="Usuario" required>
			<input type="password" name="clave" placeholder="Contraseña" required>
			
			<div class="alert">
				<?php 
					session_start();
					if (isset($_SESSION['error'])) {
						echo $_SESSION['error']; 
						unset($_SESSION['error']); // Clear the error after showing
					}
				?>
			</div>

			<input class="button" type="submit" value="INGRESAR">
		</form>
	</section>
</body>
</html>
