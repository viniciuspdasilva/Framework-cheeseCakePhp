<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 02/03/2017
     * Time: 12:11
     */

    namespace Core;
    use Exception;
    abstract class BaseController
    {
        private $request;

        public static function get(array $get):array {
            if ($get != null){
                if (isset($get)){
                    $campos = array();
                    foreach ($get as $key => $value){
                        $campos = [
                            $key => $value
                        ];
                    }
                    return $campos;
                }else{
                    return array(null);
                }
            }else{
                throw new \Exception("Get Vazio");
            }
        }
        public static function post(array $post):array {
        if ($post != null){
            if (isset($post)){
                $campos = array();
                foreach ($post as $value){
                    array_push($campos, $value);
                }
                return $campos;
            }else{
                return array(null);
            }
        }else{
            throw new \Exception("Get Vazio");
        }
    }
        public static function req(array $request):array {
            if ($request != null){
                if (isset($request)){
                    $campos = array();
                    foreach ($request as $key => $value){
                        $campos = [
                            $key => $value
                        ];
                    }
                    return $campos;
                }else{
                    return array(null);
                }
            }else{
                throw new \Exception("Get Vazio");
            }
        }
}