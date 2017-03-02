<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 24/02/2017
     * Time: 15:56
     */
    namespace Core;
    error_reporting(1);
    ini_set('display_errors', 1);

    class Routes
    {
        private $url;
        private $routes;

        function __construct (array $routes)
        {
            $this->setRoutes($routes);
            $this->run();
        }
        /**
         * @param mixed $url
         */
        public function setUrl ( $url )
        {
            $this->url = $url;
        }
        private function getUrl(){
            $url = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
            return $url;
        }
        private function setRoutes($routes){
            foreach ($routes as $route){
                $explode = explode('@',$route[1]);
                $r = [$route[0], $explode[0], $explode[1]];
                $newRoutes[] = $r;
            }
            $this->routes = $newRoutes;
        }

        private function getRequest(){
           $obj = new \stdClass();
           foreach ($_GET as $key => $value){
               $obj->get->$key = $value;
           }
            foreach ($_POST as $key => $value){
                $obj->post->$key = $value;
            }
            return $obj;
        }
        private function run(){
            $found = FALSE;
            $url = $this->getUrl();
            $urlarray = explode('/',$url);
            foreach ($this->routes as $route){
                $routeArray = explode('/',$route[0]);
                for ($i=0; $i<count($routeArray); $i++):
                    if ((strpos($routeArray[$i],"{") !== FALSE) && (count($urlarray) == count($routeArray)) ):
                        $routeArray[$i] = $urlarray[$i];
                        $param[] = $urlarray[$i];
                    endif;
                    $route[0] = implode($routeArray,'/');
                endfor;
                if ($url == $route[0]):
                    $found = TRUE;
                    $controller = $route[1];
                    $action     = $route[2];
                    break;
                endif;
            }
            if ($found){
                $controller = @Container::newController($controller);
                switch(count($param)){
                    case 1:
                        $controller->$action($param[0],$this->getRequest());
                    break;
                    case 2:
                        $controller->$action($param[0],$param[1],$this->getRequest());
                    break;
                    case 3:
                        $controller->$action($param[0],$param[1],$param[2],$this->getRequest());
                    break;
                    default:
                        $controller->$action($this->getRequest());
                    break;

                }

            }else{
                $errorContraller = "ErrosController";
                $action = 'Error404';
                $controller = @Container::newController($errorContraller);
                $controller->$action();
             }

        }




    }