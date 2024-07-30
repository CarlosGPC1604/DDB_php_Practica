<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/normalize.css">
    <link href="../styles/global.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Comparar bases de datos</title>
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
            <a href="./index.php">Inicio</a>
            <a href="./comparacion.php">Comparación de DB's</a>
        </div>
    </nav>

    <?php
        require_once(__DIR__ . '/../src/crud/comparar.php');
        compararDBvsDDB();
    ?>
</body>

</html>