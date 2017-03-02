<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 02/03/2017
     * Time: 15:51
     */

    namespace Core;


    class Database
    {
        private $cnx;

        /**
         * @return mixed
         */
        public function getCnx ()
        {
            return $this->cnx;
        }

        /**
         * @param mixed $cnx
         */
        public function setCnx ( $cnx )
        {
            $this->cnx = $cnx;
        }

        private function factoryDatabase(){
            $conf = include_once __DIR__.'/../app/database.php';
            $database[] = '';
            $database['driver'] = $conf['driver'];
            switch ($conf['driver']){
                case 'mysql':
                    $database['host']      = $conf['mysql']['host'];
                    $database['user']      = $conf['mysql']['user'];
                    $database['pass']      = $conf['mysql']['pass'];
                    $database['database']  = $conf['mysql']['database'];
                    $database['charset']   = $conf['mysql']['charset'];
                    $database['collation'] = $conf['mysql']['collation'];
                    $database['port']      = $conf['mysql']['port'];
                    var_dump($database);
                    try{
                        @$this->cnx = new \PDO("{$database['driver']}:host={$database['host']};dbname={$database['database']}","{$database['user']}","{$database['pass']}");
                        throw new \PDOException("Error ao se conectar... Error". $this->cnx->errorInfo());
                    }catch ( \PDOException $e ){
                        $e->getMessage();
                    }
                break;
                case 'sqlite':
                    return NULL;
                break;
            }
        }
        public function conn(){
            $database = $this->factoryDatabase();
            $this->cnx->query("");
        }


    }