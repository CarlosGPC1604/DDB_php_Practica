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

    echo '<table class="w-auto m-3 rounded-md bg-rose-800 text-sm text-left rtl:text-right text-rose-100 dark:text-rose-100">
            <tr>
                <th class="hover:bg-rose-900 px-6 py-3">ID</th>
                <th class="hover:bg-rose-900 px-6 py-3">Nombre</th>
                <th class="hover:bg-rose-900 px-6 py-3">Apellido Paterno</th>
                <th class="hover:bg-rose-900 px-6 py-3">Apellido Materno</th>
                <th class="hover:bg-rose-900 px-6 py-3">Correo</th>
                <th class="hover:bg-rose-900 px-6 py-3">Activo</th>
            </tr>';

    $contador=0;
    foreach ($usuarios as $usuario) {
        $contador++;
        $color = $contador % 2 ? "400" : "500";
        echo '<tr class="bg-white hover:bg-rose-700 dark:bg-rose-' . $color . ' dark:border-gray-700">
                <td class="px-6 py-3">' . htmlspecialchars($usuario['id']) . '</td>
                <td class="px-6 py-3">' . htmlspecialchars($usuario['nombre']) . '</td>
                <td class="px-6 py-3">' . htmlspecialchars($usuario['ap_paterno']) . '</td>
                <td class="px-6 py-3">' . htmlspecialchars($usuario['ap_materno']) . '</td>
                <td class="px-6 py-3">' . htmlspecialchars($usuario['correo']) . '</td>
                <td class="px-6 py-3">' . htmlspecialchars($usuario['activo']) . '</td>
              </tr>';
    }

    echo '</table>';
}

?>