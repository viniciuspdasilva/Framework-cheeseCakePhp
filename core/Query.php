<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 03/03/2017
     * Time: 13:21
     */

    namespace Core;
    use Core\Gramar;
    use PDO;
    use PDOException;

    abstract class Query extends Gramar
    {
        private $table;

        /**
         * @return mixed
         */
        public function getTable ()
        {
            return $this->table;
        }

        /**
         * @param mixed $table
         */
        public function setTable ( $table )
        {
            $this->table = $table;
        }

        protected function querySelect(PDO $link, $table, array $colums = NULL, $where = NULL){
            $select = '';
            $count  = 0;
            $size   = -1;
            $select .=  'SELECT ';
            if ($colums !== NULL){
                $size = count($colums);
                foreach ($colums as $colum) {
                    $select .= $colum;
                    $count++;
                    if ($count < $size){
                        $select .= ',';
                    }
                }

            }else{
                $select .='*';
            }
            $select .= " FROM {$table}";
            if ($where !== NULL){
                $select .= " WHERE {$where}";
            }
            $stm = $link->prepare($select);
            try{
                $stm->execute();
                $result = $stm->fetchAll();
                $link->closeCursor();
                return $result;
            }catch (PDOException $exception){
               return $exception->getMessage();
            }


        }
        protected function queryInsert(PDO $link, $table, array $campos=NULL, array $values, $where=NULL){
           $sql = '';
           $cont = 0;
           $size = -1;

           $sql .= "INSERT INTO {$table}";
           if ($campos !== NULL){
               $sql .= ' (';
               $size = count($campos);
               foreach ($campos as $campo){
                   $sql .= $campo;
                   $cont++;
                   if ($cont < $size){
                       $sql .= ',';
                   }
               }
               $sql .= ") VALUES (";
               $count = 0;
               $sizeVal = -1;
               foreach ($values as $value){
                   $sizeVal = count($values);
                   $sql .= "'{$value}'";
                   $count++;
                   if ($count < $sizeVal){
                       $sql .= ',';
                   }
               }
               $sql .= ")";
               if ($where !== NULL){
                   $sql .= " WHERE {$where}";
               }
               echo $sql;

           }
        }
        protected function queryUpdate($link){
            /*TODO:Implementar a logica do Update*/
            return TRUE;

        }
        protected function queryDelete($link){
            /*TODO:Implementar a logica do Delete*/
            return TRUE;

        }


    }