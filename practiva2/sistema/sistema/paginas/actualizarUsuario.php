<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['idusuario'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];

    $sql = "UPDATE usuario SET nombre='$nombre', correo='$correo', usuario='$usuario', rol='$rol' WHERE idusuario='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

header("Location: visualizarEditar.php");
exit();
?>
