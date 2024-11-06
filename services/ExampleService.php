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

    public function getExampleByQuery($q) {
        $data = []; 

        $example = $this->repository->getById($q);

        if ($example != null){
            $data[] = $example;
        }

        $example = $this->repository->getByLikeName($q);

        if($example != null){
            for ($i = 0; $i < count($example); $i++) { 
                $data[] = $example[$i]; 
            }
        }

        $example = $this->repository->getByLikeDescription($q);

        if($example != null){
            for ($i = 0; $i < count($example); $i++) {
                if (!$this->isExampleInArrayById($data, $example[$i]->id)){
                    $data[] = $example[$i]; 
                }
            }
        }

        return $data;
    }

    private function isExampleInArrayById($arr, $id){
        foreach ($arr as $example) {
             if ($example->id == $id) {
                 return true; 
            } 
        } 
        
        return false;
    }

}
