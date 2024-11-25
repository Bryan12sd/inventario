<?php
include 'db/config.php';

// Obtener el ID del producto desde la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar los datos del producto
$sql = "SELECT * FROM productos WHERE id = $id";
$result = $conn->query($sql);
$producto = $result->fetch_assoc();

if (!$producto) {
    die("Producto no encontrado.");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detalles.css">
    <title>Detalles del Producto</title>
</head>

<body>
    <div class="container">
        <h1>Detalles del Producto</h1>
        <div class="details">
            <p><strong>ID:</strong> <?php echo $producto['id']; ?></p>
            <p><strong>Nombre:</strong> <?php echo $producto['nombre']; ?></p>
            <p><strong>Descripción:</strong> <?php echo $producto['descripcion']; ?></p>
            <p><strong>Categoría:</strong> <?php echo $producto['categoria']; ?></p>
            <p><strong>Cantidad:</strong> <?php echo $producto['cantidad']; ?></p>
        </div>
        <a href="productos.php">Volver</a>

    </div>
</body>

</html>