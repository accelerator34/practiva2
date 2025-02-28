<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "facturacion3"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave']; 
$tipo_usuario = $_POST['tipo_usuario'];


$sql = "INSERT INTO usuario (nombre, correo, usuario, clave, rol) VALUES ('$nombre', '$correo', '$usuario', '$clave', '$tipo_usuario')";

if ($conn->query($sql) === TRUE) {
    header("Location: paginaExito.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
