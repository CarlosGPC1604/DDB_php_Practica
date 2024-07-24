<?php
require './src/config/conexion.php';

function createUser($nombre, $ap_paterno, $ap_materno, $correo, $activo) {
    $db = new Database();
    $sql = "INSERT INTO c_usuarios (nombre, ap_paterno, ap_materno, correo, activo) VALUES (:nombre, :ap_paterno, :ap_materno, :correo, :activo)";
    $params = [
        'nombre' => $nombre,
        'ap_paterno' => $ap_paterno,
        'ap_materno' => $ap_materno,
        'correo' => $correo,
        'activo' => $activo
    ];
    $db->executeQuery($sql, $params);
    return $db->pdo->lastInsertId();
}

// Ejemplo de uso
$newUserId = createUser('Carlos', 'Pulido', 'Cervantes', '222170006@uvalle.edu.mx', 'S');
echo "Nuevo usuario creado con ID: $newUserId\n";
?>
