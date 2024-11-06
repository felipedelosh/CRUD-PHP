<?php

require_once 'config/Database.php';
require_once 'services/ExampleService.php';

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
}
