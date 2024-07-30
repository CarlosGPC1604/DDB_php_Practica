<?php
    require_once __DIR__ . '/../../vendor/autoload.php';

    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    require_once(__DIR__.'/../config/conexion.php');
    
    function compararDBvsDDB(){
        $db = new Database();
        $sql = "SELECT * FROM c_usuarios";
        $stmt = $db->executeQuery($sql);
        $usuarios = $stmt->fetchAll();
        
        $db = new Database($_ENV['serverInfranet'], $_ENV['dbnameInfranet'], $_ENV['userInfranet'], $_ENV['passwordInfranet']);
        $sql = "SELECT * FROM c_usuarios";
        $stmt = $db->executeQuery($sql);
        $usuariosDDB = $stmt->fetchAll();
        
        if(count($usuarios) != count($usuariosDDB)){
            echo "<p>Las tablas no tienen la misma cantidad de registros.</p>";

            echo "<h2>Usuarios faltantes:</h2>";
            foreach($usuarios as $usuario){
                $encontrado = false;
                foreach($usuariosDDB as $usuarioDDB){
                    if($usuario['id'] == $usuarioDDB['id']){
                        $encontrado = true;
                        break;
                    }
                }
                if(!$encontrado){
                    echo "<p>{$usuario['id']} - {$usuario['nombre']} - {$usuario['ap_paterno']} - {$usuario['ap_materno']} - {$usuario['correo']} - {$usuario['activo']}</p>";
                }
            }
            return;
        }
    }
?>