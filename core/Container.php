<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 24/02/2017
     * Time: 17:36
     */

    namespace Core;


    class Container
    {
        /**
         * @param $controller
         */
        public static function newController($controller){
            $controller = "App\\Controller\\" . $controller;
            return new $controller;
        }
    }