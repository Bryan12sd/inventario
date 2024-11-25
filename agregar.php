<?php
include './db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO productos (nombre, descripcion, categoria, cantidad) VALUES ('$nombre', '$descripcion', '$categoria', $cantidad)";
    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado con éxito.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/agregar.css">
    <title>Agregar Producto</title>
</head>

<body>
    <h1>Agregar Producto</h1>
    <form action="agregar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br><br>

        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" required><br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required><br><br>

        <button type="submit">Agregar Producto</button>
    </form>
</body>

</html>