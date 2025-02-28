<?php
include 'conexion.php';

$users_per_page = 5;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); 

$offset = ($page - 1) * $users_per_page;

$total_users_sql = "SELECT COUNT(*) as total FROM usuario";
$total_users_result = $conn->query($total_users_sql);
$total_users_row = $total_users_result->fetch_assoc();
$total_users = $total_users_row['total'];

$total_pages = ceil($total_users / $users_per_page);

$sql = "SELECT * FROM usuario LIMIT $users_per_page OFFSET $offset";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
        height: 400px;
        display: flex;
        flex-direction: column;
        background: #ededed;
        gap: 50px;
        justify-content: left;
        }

  /* Table Styling */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: #fff;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

thead {
    background: #0D5C63; /* Dark blue-green header */
    color: white;
    text-align: left;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

tbody tr:nth-child(even) {
    background: #f2f2f2; /* Light gray alternate rows */
}

tbody tr:hover {
    background: #ddd;
}

/* Buttons */
.btn {
    display: inline-block;
    padding: 8px 12px;
    background: #3498db; /* Blue */
    color: white;
    text-decoration: none;
    border-radius: 4px;
    margin-bottom: 10px;
}

.btn:hover {
    background: #2980b9; /* Darker blue */
}

/* Action Links */
a {
    text-decoration: none;
    color: #3498db;
    font-weight: bold;
    margin-right: 10px;
}

a:hover {
    text-decoration: underline;
}

a[style="color: red;"] {
    color: red;
    font-weight: bold;
}

a[style="color: red;"]:hover {
    text-decoration: underline;
}

        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 5px;
            color: white;
            background: #3498db;
            text-decoration: none;
            border-radius: 4px;
        }
        .pagination a:hover {
            background: #2980b9;
        }
        .pagination .disabled {
            background: #bdc3c7;
            pointer-events: none;
        }



        /* Edit Form Modal */
#edit-form {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    width: 400px;
    display: none;
    z-index: 1000;
}

/* Close Button */
#close-edit-form {
    position: absolute;
    top: 10px;
    right: 15px;
    background: red;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    padding: 5px;
    border-radius: 50%;
    width: 25px;
    height: 25px;
}

/* Form Fields */
#edit-form label {
    font-weight: bold;
    display: block;
    margin: 10px 0 5px;
}

#edit-form input,
#edit-form select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Buttons */
#edit-form button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    color:white;
    border-radius: 5px;
}

#edit-form button[type="submit"] {
    background: #3498db;
    color: white;
}

#edit-form button[type="submit"]:hover {
    background: #2980b9;
}

#edit-form button[style="color: red;"] {
    background: red;
    color: white !important; /* Ensures white text */
    font-weight: bold;
}

#edit-form button[style="color: red;"]:hover {
    background: darkred;
}


.search-box {
    width: 100%;
    max-width: 300px;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
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
				<img class="photouser" src="../img/user.png" alt="Usuario">
				<a href="../logout.php"><img class="close" src="../img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<nav>
			<ul>
				<li><a href="../index.php">Inicio</a></li>
				<li class="principal">
					<a href="#">Usuarios</a>
					<ul>
						<li><a href="../registroUsuario.php">Nuevo Usuario</a></li>
						<li><a href="visualizarEditar.php">Lista de Usuarios</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Clientes</a>
					<ul>
						<li><a href="clientes/regClientes.php">Nuevo Cliente</a></li>
						<li><a href="clientes/visualizarClientes.php">Lista de Clientes</a></li>
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

    <a href="../registroUsuario.php" class="btn">Crear usuario</a>
    <input type="text" id="searchInput" placeholder="Buscar usuario..." class="search-box">

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['idusuario'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['correo'] ?></td>
                <td><?= $row['usuario'] ?></td>
                <td><?= ($row['rol'] == 1) ? 'Administrador' : 'Usuario' ?></td>
                <td>
                    <button class="edit-btn" 
                        data-id="<?= $row['idusuario'] ?>" 
                        data-nombre="<?= $row['nombre'] ?>" 
                        data-correo="<?= $row['correo'] ?>" 
                        data-usuario="<?= $row['usuario'] ?>" 
                        data-rol="<?= $row['rol'] ?>">Editar</button>
                        
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">Anterior</a>
        <?php else: ?>
            <a class="disabled">Anterior</a>
        <?php endif; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page + 1 ?>">Siguiente</a>
        <?php else: ?>
            <a class="disabled">Siguiente</a>
        <?php endif; ?>
    </div>

<!-- Edit Form (Styled as a Modal) -->
<div id="edit-form">
    <button id="close-edit-form">×</button>
    <h2>Editar Usuario</h2>
    
    <form action="ActualizarUsuario.php" method="POST">
        <input type="hidden" name="idusuario" id="edit-id">
        
        <label for="edit-nombre">Nombre:</label>
        <input type="text" name="nombre" id="edit-nombre" required>

        <label for="edit-correo">Correo Electrónico:</label>
        <input type="email" name="correo" id="edit-correo" required>

        <label for="edit-usuario">Usuario:</label>
        <input type="text" name="usuario" id="edit-usuario" required>

        <label for="edit-rol">Tipo de Usuario:</label>
        <select name="rol" id="edit-rol">
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
        </select>

        <button type="submit">Actualizar Usuario</button>
    </form>

    <form action="EliminarUsuario.php" method="POST">
        <input type="hidden" name="idusuario" id="delete-id">
        <button type="submit" style="color: red;">Eliminar Usuario</button>
    </form>
</div>


<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('edit-id').value = this.dataset.id;
            document.getElementById('edit-nombre').value = this.dataset.nombre;
            document.getElementById('edit-correo').value = this.dataset.correo;
            document.getElementById('edit-usuario').value = this.dataset.usuario;
            document.getElementById('edit-rol').value = this.dataset.rol;
            document.getElementById('delete-id').value = this.dataset.id;

            document.getElementById('edit-form').style.display = 'block';
        });
    });

    document.getElementById('close-edit-form').addEventListener('click', function() {
        document.getElementById('edit-form').style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        let form = document.getElementById('edit-form');
        if (event.target !== form && !form.contains(event.target) && event.target.className !== 'edit-btn') {
            form.style.display = 'none';
        }
    });


    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("searchInput").addEventListener("input", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let name = row.cells[1].textContent.toLowerCase();
            let email = row.cells[2].textContent.toLowerCase();
            let username = row.cells[3].textContent.toLowerCase();
            
            if (name.includes(filter) || email.includes(filter) || username.includes(filter)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
});
</script>
</body>
</html>
