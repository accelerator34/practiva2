<?php
session_start();
include 'conexion.php'; // Database connection

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $clave = trim($_POST['clave']);

    // Prevent empty inputs
    if (empty($usuario) || empty($clave)) {
        $_SESSION['error'] = "Usuario y contraseña requeridos.";
        header("Location: login.php");
        exit();
    }

    // Fetch user from database
    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($clave === $row['clave']) { // (NOTE: Consider hashing passwords for security)
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['rol'] = $row['rol'];

            // Redirect based on role
            if ($_SESSION['rol'] == 1) {
                header("Location: sistema/sistema/index.php"); // Admin Dashboard
            } elseif ($_SESSION['rol'] == 2) {
                header("Location: sistema/sistema/index.php"); // Cashier Facturas Page
            } else {
                header("Location: sistema/sistema/index.php"); // Default Redirect
            }
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
        header("Location: login.php");
        exit();
    }
}

$conn->close();
?>
