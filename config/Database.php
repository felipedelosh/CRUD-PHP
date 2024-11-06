<?php

class Database {
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $config = include __DIR__ . '/env.php';
            $this->conn = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['username'], $config['password']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
