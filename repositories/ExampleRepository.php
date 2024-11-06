<?php

require_once __DIR__ . '/../models/Example.php';

class ExampleRepository {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT id, NAME, DESCRIPTION FROM examples";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $examples = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $examples[] = new Example($row['id'], $row['NAME'], $row['DESCRIPTION']);
        }

        return $examples;
    }


    public function getById($id) {
        $query = "SELECT id, NAME, DESCRIPTION FROM examples where id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($row) {
            return new Example($row['id'], $row['NAME'], $row['DESCRIPTION']); 
        } else { 
            return null; 
        }
    }
}
