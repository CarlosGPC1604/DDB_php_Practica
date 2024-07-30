<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class Database {
    private $host;
    private $db;
    private $user;
    private $pass;
    public $pdo;

    public function __construct($servername = null, $dbname = null, $username = null, $password = null) {
        if ($servername !== null && $dbname !== null && $username !== null && $password !== null) {
            $this->host = $servername;
            $this->db = $dbname;
            $this->user = $username;
            $this->pass = $password;
        } else {
            $this->host = $_ENV['servername'];
            $this->db = $_ENV['dbname'];
            $this->user = $_ENV['username'];
            $this->pass = $_ENV['password'];
        }
    
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function executeQuery($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Database query error: " . $e->getMessage());
        }
    }

    public function conectarAInfranet(){
        $this->host = $_ENV['serverInfranet'];
        $this->db = $_ENV['dbnameInfranet'];
        $this->user = $_ENV['userInfranet'];
        $this->pass = $_ENV['passwordInfranet'];
        
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function checkConnection() {
        try {
            $this->pdo->query("SELECT 1");
            return "Connection successful!";
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }

    public function __destruct() {
        $this->pdo = null;
    }
}

//  Ejemplo de uso para verificar la conexión
//  $db = new Database();
//  echo $db->checkConnection();
?>
