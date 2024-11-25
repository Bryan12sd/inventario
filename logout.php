<?php
session_start();

// Destruir la sesión
session_destroy();

// Mostrar mensaje de despedida
echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Logout</title>
    <link rel='stylesheet' href='./css/logout.css'>
</head>
<body>
    <div class='container'>
        <h1>¡Eso era todo!</h1>
        <p>Gracias por visitarnos. ¡Hasta la próxima!</p>
        <p>Serás redirigido en 5 segundos...</p>
    </div>
</body>
</html>
";

// Redirigir después de 5 segundos
header("refresh:5; url=login.php");
exit();
?>