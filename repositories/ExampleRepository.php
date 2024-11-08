<?php

require_once __DIR__ . '/../models/Example.php';

class ExampleRepository {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getNextId() {
        $query = "SELECT COUNT(*) + 1 AS next_id FROM examples";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['next_id'];
    }

    public function createNewExample($name, $description){
        $id = $this->getNextId();
        
        $query = "INSERT INTO examples (id, NAME, DESCRIPTION) VALUES (:id, :name, :description)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        
        if ($stmt->execute()) {
            return $id;
        } else {
            return -1;
        }
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

    public function getByLikeName($q) {
        $query = "SELECT id, NAME, DESCRIPTION FROM examples WHERE NAME LIKE :q";
        $stmt = $this->conn->prepare($query);
        $likeQuery = '%' . $q . '%';
        $stmt->bindParam(':q', $likeQuery);
        $stmt->execute();
    
        $examples = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $examples[] = new Example($row['id'], $row['NAME'], $row['DESCRIPTION']);
        }
    
        return $examples;
    }

    public function getByLikeDescription($q) {
        $query = "SELECT id, NAME, DESCRIPTION FROM examples WHERE DESCRIPTION LIKE :q";
        $stmt = $this->conn->prepare($query);
        $likeQuery = '%' . $q . '%';
        $stmt->bindParam(':q', $likeQuery);
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

    public function updateExample($id, $name, $description) {
        $query = "UPDATE examples SET NAME = :name, DESCRIPTION = :description WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }


    public function deleteExample($id){
        $query = "DELETE FROM examples WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
}
