<?php
require_once(__DIR__.'/../config/conexion.php');

function consultarUsuarios()
{
    $db = new Database();
    $sql = "SELECT * FROM c_usuarios";
    $stmt = $db->executeQuery($sql);
    return $stmt->fetchAll();
}

function generarTablaUsuarios()
{
    $usuarios = consultarUsuarios();

    if (count($usuarios) == 0) {
        echo "<p>No se encontraron usuarios.</p>";
        return;
    }

    echo '<table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Activo</th>
            </tr>';

    foreach ($usuarios as $usuario) {
        echo '<tr>
                <td>' . htmlspecialchars($usuario['id']) . '</td>
                <td>' . htmlspecialchars($usuario['nombre']) . '</td>
                <td>' . htmlspecialchars($usuario['ap_paterno']) . '</td>
                <td>' . htmlspecialchars($usuario['ap_materno']) . '</td>
                <td>' . htmlspecialchars($usuario['correo']) . '</td>
                <td>' . htmlspecialchars($usuario['activo']) . '</td>
              </tr>';
    }

    echo '</table>';
}

?>