<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../services/ExampleService.php';

class ExampleController {
    private $service;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->service = new ExampleService($db);
    }

    public function getAllExamplesInJson() {
        $examples = $this->service->getAllExamples();
        
        header('Content-Type: application/json');
        echo json_encode($examples);
    }

    public function getAllExamplesInArray() {
        return $this->service->getAllExamples();
    }

    public function getExampleByQuery($q) {
        return $this->service->getExampleByQuery($q);
    }

    public function createNewExample($name, $description){
        return $this->service->createNewExample($name, $description);
    }

    public function updateExample($id, $name, $description){
        $this->service->updateExample($id, $name, $description);
    }
    
}
