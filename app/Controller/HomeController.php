<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 24/02/2017
     * Time: 17:33
     */

    namespace App\Controller;


    class homeController
    {
        public function index(){
          require_once __DIR__."/../Views/home/index.phtml";
        }
        public function show($id, $request){
            echo $id," --- ","<br/>";
            echo $request->get->id;
        }

    }