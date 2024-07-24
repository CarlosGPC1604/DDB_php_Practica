<?php
require_once(__DIR__.'/../config/conexion.php');

function updateUser($id, $nombre, $ap_paterno, $ap_materno, $correo, $activo) {
    $db = new Database();
    $sql = "UPDATE c_usuarios SET nombre = :nombre, ap_paterno = :ap_paterno, ap_materno = :ap_materno, correo = :correo, activo = :activo WHERE id = :id";
    $params = [
        'id' => $id,
        'nombre' => $nombre,
        'ap_paterno' => $ap_paterno,
        'ap_materno' => $ap_materno,
        'correo' => $correo,
        'activo' => $activo
    ];
    $stmt = $db->executeQuery($sql, $params);
    return $stmt->rowCount();
}

// Ejemplo de uso
$updatedRows = updateUser(4, 'Carlos', 'Pulido', 'Cervantes', '222170006@uvalle.edu.mx', 'S');
echo "Filas actualizadas: $updatedRows\n";
?>
