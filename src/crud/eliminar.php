<?php
require_once(__DIR__.'/../config/conexion.php');

function eliminarUsuario($id) {
    $db = new Database();
    $sql = "DELETE FROM c_usuarios WHERE id = :id";
    $params = ['id' => $id];
    $db->executeQuery($sql, $params);
    return $db->pdo->lastInsertId();
}

?>
