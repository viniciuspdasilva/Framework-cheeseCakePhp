<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 24/02/2017
     * Time: 17:33
     */

    namespace App\Controller;


    use Core\BaseController;

    class homeController extends BaseController
    {

        public function index(){
            $this->view->nome = "Vinicius Pereira da Silva";
            $this->renderView('home/index','layout','home');

        }
        public function show($id, $request){
            echo $id," --- ","<br/>";
            echo $request->get->id;
        }


    }