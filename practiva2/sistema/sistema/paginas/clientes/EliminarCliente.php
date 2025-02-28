<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['idusuario'];

    $sql = "DELETE FROM cliente WHERE CodCliente='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}

header("Location: visualizarEditar.php");
exit();
?>
