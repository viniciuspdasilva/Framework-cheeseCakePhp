<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 02/03/2017
     * Time: 15:34
     */

    namespace App\Controller;


    use Core\BaseController;

    class ErrosController extends BaseController
    {
        public function Error404(){
            $this->renderView('Erros/404','layout-erros');
        }

    }