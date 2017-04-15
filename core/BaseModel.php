<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 03/03/2017
     * Time: 16:34
     */

    namespace Core;
    use PDO;
    use Core\Database;

    abstract class BaseModel extends Database
    {
        private $pdo;
        protected $table;

        function __construct (PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        protected function All(){
            $query = $this->querySelect($this->pdo, $this->table);
            return $query;
        }
        protected function buscaPorId($id){
            $query = "SELECT * FROM{$this->table} WHERY id = {$id}";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchObject();
            $stmt->closeCursor();
            return $result;
        }




        /*public function*/
        public function createTable($table,array $campos){
            $pdo = Database::getInstance();
           $sql = '';
           $cont = 0;
           $size = -1;
           $size = count($campos);
           $sql .= "CREATE TABLE $table (";
           foreach ($campos as $campo){
               $sql .= "$campo";
               $cont++;
               if ($cont < $size){
                   $sql .= ' , ';
               }
           }
           $sql .= ')';
           $stmt = $pdo->prepare($sql);
           $create = $stmt->execute();
           if ($create){
               echo 'table criada com sucesso!';
           }
        }
    }