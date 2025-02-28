<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Sisteme Ventas</title>
    <style>
        /* Form Container Styling */
        #container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Form Card Styling */
        .form-card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-card h2 {
            text-align: center;
            font-size: 22px;
            color: #333;
            margin-bottom: 20px;
        }

        .form-card label {
            font-size: 16px;
            color: #555;
            margin-bottom: 5px;
        }

        .form-card input,
        .form-card select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .form-card button {
            background-color: #3a5f8a;
            color: #fff;
            padding: 12px;
            border: none;
            width: 100%;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .form-card button:hover {
            background-color: #305f74;
        }

        /* Responsive design for mobile */
        @media (max-width: 768px) {
            .form-card {
                padding: 15px;
            }

            .form-card input,
            .form-card select {
                padding: 8px;
                font-size: 14px;
            }

            .form-card button {
                padding: 10px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
	<header>
		<div class="header">
			
			<h1>Sistema Facturación</h1>
			<div class="optionsBar">
				<p>República Dominicana, 16 Enero de 2024</p>
				<span>|</span>
				<span class="user">Yandel Medrano</span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li class="principal">
					<a href="#">Usuarios</a>
					<ul>
						<li><a href="#">Nuevo Usuario</a></li>
						<li><a href="paginas/visualizarEditar.php">Lista de Usuarios</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Clientes</a>
					<ul>
						<li><a href="#">Nuevo Cliente</a></li>
						<li><a href="#">Lista de Clientes</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Proveedores</a>
					<ul>
						<li><a href="#">Nuevo Proveedor</a></li>
						<li><a href="#">Lista de Proveedores</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Productos</a>
					<ul>
						<li><a href="#">Nuevo Producto</a></li>
						<li><a href="#">Lista de Productos</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Facturas</a>
					<ul>
						<li><a href="#">Nuevo Factura</a></li>
						<li><a href="#">Facturas</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	<section class="form-card" id="container">
		<h2>Registro de Usuario</h2>
		<form action="registrarUsuarios.php" method="POST">
			<label for="nombre">Nombre Completo:</label>
			<input type="text" name="nombre" id="nombre" required><br><br>
			
			<label for="correo">Correo Electrónico:</label>
			<input type="email" name="correo" id="correo" required><br><br>
			
			<label for="usuario">Usuario:</label>
			<input type="text" name="usuario" id="usuario" required><br><br>
			
			<label for="clave">Clave:</label>
			<input type="password" name="clave" id="clave" required><br><br>
			
			<label for="tipo_usuario">Tipo de Usuario:</label>
			<select name="tipo_usuario" id="tipo_usuario">
				<option value="1">Administrador</option>
				<option value="2">Usuario</option>
				<option value="3">Reponedor</option>
			</select><br><br>
			
			<button type="submit">Crear Usuario</button>
		</form>
	</section>
</body>
</html>