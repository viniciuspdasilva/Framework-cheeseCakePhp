<?php
/**
 * Created by PhpStorm.
 * User: b-boy
 * Date: 27/03/2017
 * Time: 13:20
 */

namespace App\Controller;
use Core\ViewBase;
use Core\BaseController;
use Core\BaseModel;

class RecursosHumanosController
{
    public function index()
    {
        ViewBase::view('RH/index.tpl');

    }
    public function cadastro(){
        $index = ViewBase::getInstance();
        $index->assign('matricula',1002993092);
        $index->display('RH/cadastro.tpl');
    }
    public function relatorios(){
        $index = ViewBase::getInstance();
        $index->assign('matricula',1002993092);
        $index->display('RH/relatorio.tpl');
    }

}