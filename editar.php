<?php
include 'db/config.php';

// Obtener el ID del producto desde la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar los datos actuales del producto
$sql = "SELECT * FROM productos WHERE id = $id";
$result = $conn->query($sql);
$producto = $result->fetch_assoc();

if (!$producto) {
    die("Producto no encontrado.");
}

// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $cantidad = intval($_POST['cantidad']);

    $update_sql = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', categoria = '$categoria', cantidad = $cantidad WHERE id = $id";
    if ($conn->query($update_sql) === TRUE) {
        header("Location: productos.php?mensaje=Producto actualizado con éxito");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/editar.css">
    <title>Editar Producto</title>
</head>

<body>
    <div class="container">
        <h1>Editar Producto</h1>
        <form action="editar.php?id=<?php echo $id; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br><br>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"
                required><?php echo $producto['descripcion']; ?></textarea><br><br>

            <label for="categoria">Categoría:</label>
            <input type="text" id="categoria" name="categoria" value="<?php echo $producto['categoria']; ?>"
                required><br><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo $producto['cantidad']; ?>"
                required><br><br>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>

</html>