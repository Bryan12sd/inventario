<?php
include 'db/config.php';

// Obtener el ID del producto desde la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $delete_sql = "DELETE FROM productos WHERE id = $id";
    if ($conn->query($delete_sql) === TRUE) {
        header("Location: productos.php?mensaje=Producto eliminado con éxito");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    echo "ID inválido.";
}
?>