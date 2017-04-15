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
    use stdClass;

    abstract class Query
    {
        private $table;

        /**
         *
         */

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

        protected static function querySelect(PDO $link, $table, array $colums = NULL, $where = NULL){
            $bdResult = new stdClass();
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
                $select .= " WHERE {$where} ";
            }
            $stm = $link->prepare($select);
            try{
                $stm->execute();
                while($result[] = $stm->fetch(PDO::FETCH_ASSOC)){
                    $result[] = $stm->fetch(PDO::FETCH_ASSOC);
                }
                $stm->closeCursor();
                return $result;
            }catch (PDOException $exception){
               return $exception->getMessage();
            }


        }

        /**
         * @param PDO $link
         * @param $table
         * @param array|NULL $campos
         * @param array $values
         * @param null $where
         * @return bool
         */
        protected static function queryInsert(PDO $link, $table,array $values , array $campos=NULL, $where=NULL){
            $sql = '';
            $cont = 0;
            $size = -1;
            $sql .= "INSERT INTO {$table}";
               $sql .= ' (';
               if ($campos !== null) {
                   $size = count($campos);
                   foreach ($campos as $campo) {
                       $sql .= $campo;
                       $cont++;
                       if ($cont < $size) {
                           $sql .= ',';
                       }
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
               $stm = $link->prepare($sql);
               try{
                    $stm->execute();
                    $stm->closeCursor();
               }catch (PDOException $exception) {
                   echo $exception->getMessage();
               }
        }

        /**
         * @param $link
         */
        protected function queryUpdate(PDO $link, $table, array $campos, array $values, $where=NULL){
            $sql = "";
            $count = 0;
            $size  = -1;
            $countCampos = count($campos);
            $countValues = count($values);
            if($campos === NULL || $countCampos === 0):
                throw new PDOException("Campo campo não pode ser vazio");
                exit();
            else:
                if ($values === NULL || $countValues === 0):
                    throw new PDOException("Campo valor não pode ser vazio");
                    exit();
                else:
                    if ($countCampos === $countValues){
                        $sql = "UPDATE $table SET ";
                        $sizeCampos = count($campos);
                        $sizeValues = count($values);
                        for ($i=0; $i < $sizeCampos;$i++){
                            $sql .= "$campos[$i] = $values[$i]";
                            $count++;
                            if ($count < $sizeCampos){
                                $sql .= ' , ';
                            }
                        }
                        if ($where !== null){
                            $sql .= " WHERE $where";
                        }else{
                            $sql .= ";";
                        }
                    }else{
                       throw new PDOException("Campos devem ser identificados");
                       exit();
                    }
                endif;
            endif;
            $stm = $link->prepare($sql);
            try{
                $stm->execute();
                $stm->closeCursor();
                return true;

            }catch (PDOException $exception){
                return $exception->getMessage();
            }
        }
        protected function queryDelete(PDO $link, $table, $where=NULL){
            $sql = "";
            $sql = "DELETE FROM $table";
                if ($where !== null){
                    $sql .= " WHERE $where";
                }else{
                    $sql .= ";";
                }
            $stm = $link->prepare($sql);
            try{
                $stm->execute();
                $stm->closeCursor();
                return true;

            }catch (PDOException $exception){
                return $exception->getMessage();
            }

        }


    }