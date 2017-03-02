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
            echo "ChesseCake Framework";
        }
        public function show($id){
            echo $id," --- ", homeController::index();
        }

    }