<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 03/03/2017
     * Time: 13:21
     */

    namespace Core;
    use Core\Gramar;

    abstract class Query extends Gramar
    {
        protected function querySelect($link){
            
            echo 'select';
        }
        protected function queryInsert($link){
            /*TODO:Implementar a logica do Insert*/
            echo 'insert';
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