<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['Telefono'];
    $usuario = $_POST['Direccion'];

    $sql = "UPDATE cliente SET nombre='$nombre', Telefono='$correo', Direccion='$usuario'";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

header("Location: visualizarEditar.php");
exit();
?>
