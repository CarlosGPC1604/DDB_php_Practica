<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/global.css">
    <link rel="stylesheet" href="/styles/normalize.css">
    <title>Inicio</title>
</head>

<body>
    <nav class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <div class="nav-links">
            <a href="#">Inicio</a>
            <a href="#">Usuarios</a>
        </div>
    </nav>
    <div class="center">
    <?php
        require_once(__DIR__ . '/../src/crud/consultar.php');
        generarTablaUsuarios();
    ?>
    </div>
</body>

</html>