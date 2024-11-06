<?php

require_once __DIR__ . '/../repositories/ExampleRepository.php';

class ExampleService {
    private $repository;

    public function __construct($db) {
        $this->repository = new ExampleRepository($db);
    }

    public function getAllExamples() {
        return $this->repository->getAll();
    }
}
