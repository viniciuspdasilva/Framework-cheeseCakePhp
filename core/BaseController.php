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
        protected function renderView($caminho,$layoutPath = NULL,$title=NULL){
               $this->viewPath   = $caminho;
               $this->layoutPath = $layoutPath;
               if($layoutPath){
                   $this->layout();
               }else {
                   $this->content();
               }
        }
        /*public function setTitle($title){
            $title = new \stdClass();
            $title->nome = $title;
            $this->getTitle($title);
        }
        protected function getTitle($title){
            if ($title !== NULL){
                $titlePag = new \stdClass();
                $titlePag->nome = $title;
                return $titlePag;
            }else{
                echo "CheeseCake - Framework";
            }
        }*/
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