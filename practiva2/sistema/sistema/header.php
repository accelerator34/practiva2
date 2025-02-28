<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Facturación</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="header">
        <h1>Sistema Facturación</h1>
        <div class="optionsBar">
            <p>República Dominicana, 16 Enero de 2024</p>
            <span>|</span>
            <span class="user"><?php echo $_SESSION['usuario']; ?></span>
            <img class="photouser" src="img/user.png" alt="Usuario">
            <a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
        </div>
    </div>

    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>

            <?php if ($_SESSION['rol'] == 1): // Admin (sees everything) ?>
                <li class="principal">
                    <a href="#">Usuarios</a>
                    <ul>
                        <li><a href="registroUsuario.php">Nuevo Usuario</a></li>
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
                    <a href="#">Factura</a>
                    <ul>
                        <li><a href="#">Nueva Factura</a></li>
                        <li><a href="#">Lista de Facturas</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if ($_SESSION['rol'] == 2): // Cajero (Only sees Facturas) ?>
                <li class="principal">
                    <a href="#">Facturas</a>
                    <ul>
                        <li><a href="#">Nueva Factura</a></li>
                        <li><a href="#">Facturas</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if ($_SESSION['rol'] == 3): ?>
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
            <?php endif; ?>

        </ul>
    </nav>
