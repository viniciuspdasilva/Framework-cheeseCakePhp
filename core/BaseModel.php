<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 03/03/2017
     * Time: 16:34
     */

    namespace Core;
    use PDO;

    abstract class BaseModel
    {
        private $pdo;
        protected $table;

        function __construct (PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function All(){
            $query = "SELECT * FROM{$this->table}";
            $stmt  = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $stmt->closeCursor();
            return $result;
        }
        public function buscaPorId($id){
            $query = "SELECT * FROM{$this->table} WHERY id = {$id}";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $stmt->closeCursor();
            return $result;
        }

        public function rel()
        {
            
        }


    }