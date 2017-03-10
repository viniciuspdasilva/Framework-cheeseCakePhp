<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 02/03/2017
     * Time: 15:51
     */

    namespace Core;
    use Core\Query;
    use PDO;
    use PDOException;

    class Database extends Query
    {
        public static $instance;

        /**
         * @return mixed
         */
        private function factoryDatabase(){
            $conf = include_once __DIR__ . '/../app/database.php';
            $database = [];
            $database['driver'] = $conf['driver'];
            switch ($database['driver']){
                case 'mysql':
                    $database ['host']         =   $conf['mysql']['host'];
                    $database ['user']         =   $conf['mysql']['user'];
                    $database ['pass']         =   $conf['mysql']['pass'];
                    $database ['database']     =   $conf['mysql']['database'];
                    $database ['charset']      =   $conf['mysql']['charset'];
                    $database ['collation']    =   $conf['mysql']['collation'];
                    $database ['port']         =   $conf['mysql']['port'];
                break;
                case 'sqlite':
                    return NULL;
                break;

            }
            return $database;
        }


        public function __construct($crud) {
            $this->run($crud);
            parent::__construct();
        }

        public function getInstance() {
            $database = $this->factoryDatabase();
            var_dump($database);
            $host = $database['host'];
            $data = $database['database'];
            $charset = $database['charset'];
            $user    = $database['user'];
            $pass    = $database['pass'];
            $collation = $database['collation'];
            try{
                    $pdo = new PDO("mysql:host=$host;dbname=$data;charset=$charset","$user","$pass");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES '$charset' COLLATE '$collation'
                    ");
                    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                    return $pdo;
                }catch (PDOException $exception){
                   echo $exception->getMessage();
                }
        }
        /*
         * @var $crud mixed
         * $crud -> recebe uma das opções do crud
         * opcoes ->
         * */
        public function run($crud){
            $conn   = Database::getInstance();
            $table  = array('nome','telefone','email',11,11,11,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
            $values = array('Nome', 'Telefone', 'Email', '11');
            $where = 'id = 1 AND nome <> 1';
            switch ($crud){
                case "SELECT":
                    $select = Query::querySelect($conn,'alunos',$table,$where);
                    return $select;
                break;
                case "INSERT":
                    $insert = Query::queryInsert($conn,'alunos',$table,$values,$where);
                    return $insert;
                break;
                case "UPDATE":
                    $update = Query::queryUpdate($conn);
                    return $update;
                break;
                case "DELETE":
                    $delete = Query::queryDelete($conn);
                break;
            }
        }



    }