<?php
session_start();
include 'db/config.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Variables para búsqueda y filtro
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Consulta con búsqueda y filtro
$sql = "SELECT * FROM productos WHERE 1";
if (!empty($buscar)) {
    $sql .= " AND nombre LIKE '%$buscar%'";
}
if (!empty($categoria)) {
    $sql .= " AND categoria = '$categoria'";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/productos.css">

    <title>Gestión de Productos</title>

</head>

<body>
    <h1>Gestión de Productos</h1>

    <!-- Menú General -->
    <div class="menu">
        <a href="productos.php">Inicio</a>
        <a href="registro.php">Registrar Usuario</a>

        <a href="logout.php">Cerrar Sesión</a>
    </div>

    <!-- Mostrar mensaje si existe -->
    <?php
    if (isset($_GET['mensaje'])) {
        echo "<p style='color: green;'>" . htmlspecialchars($_GET['mensaje']) . "</p>";
    }
    ?>

    <!-- Formulario de búsqueda y filtro -->
    <form action="productos.php" method="GET">
        <input type="text" name="buscar" placeholder="Buscar por nombre"
            value="<?php echo htmlspecialchars($buscar); ?>">
        <select name="categoria">
            <option value="">Todas las categorías</option>
            <option value="Electrónica" <?php echo $categoria === 'Electrónica' ? 'selected' : ''; ?>>Electrónica</option>
            <option value="Ropa" <?php echo $categoria === 'Ropa' ? 'selected' : ''; ?>>Ropa</option>
            <option value="Comida" <?php echo $categoria === 'Comida' ? 'selected' : ''; ?>>Comida</option>
        </select>
        <button type="submit">Buscar</button>
    </form>

    <!-- Tabla de productos -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td>
                        <a href="detalles.php?id=<?php echo $row['id']; ?>">Detalles</a>
                        <?php if ($_SESSION['usuario']['rol'] === 'admin'): ?>
                            | <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                            | <a href="eliminar.php?id=<?php echo $row['id']; ?>"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Enlace para agregar nuevo producto -->
    <?php if ($_SESSION['usuario']['rol'] === 'admin'): ?>
        <a href="agregar.php">Agregar Producto</a>
    <?php endif; ?>
</body>

</html>