<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 02/03/2017
     * Time: 12:11
     */

    namespace Core;


    abstract class BaseController
    {
        protected $view;
        private $viewPath;
        private $layoutPath;

        function __construct ()
        {
            $this->view = new \stdClass();
        }
        protected function renderView($caminho,$layoutPath = NULL){
               $this->viewPath   = $caminho;
               $this->layoutPath = $layoutPath;
               if($layoutPath){
                   $this->layout();
               }else{
                   $this->content();
               }

        }
        protected function content(){
            if(file_exists( __DIR__."/../app/Views/{$this->viewPath}.phtml")){
                require_once __DIR__."/../app/Views/{$this->viewPath}.phtml";
            }else{
                echo "Error: View patch não encontrada";
            }
        }
        protected function layout(){
            if(file_exists( __DIR__."/../app/Views/{$this->layoutPath}.phtml")){
                require_once __DIR__."/../app/Views/{$this->layoutPath}.phtml";
            }else{
                echo "Error: Layout patch não encontrada";
            }
        }

    }