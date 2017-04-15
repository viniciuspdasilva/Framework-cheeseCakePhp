<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 02/03/2017
     * Time: 15:34
     */

    namespace App\Controller;


    use Core\BaseController;
    use Core\ViewBase;

    class ErrosController extends BaseController
    {
        public function Error404(){
            ViewBase::view('Erros/404.tpl');
        }

    }