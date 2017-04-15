<?php
/**
 * Created by PhpStorm.
 * User: b-boy
 * Date: 27/03/2017
 * Time: 13:19
 */

namespace App\Controller;
use Core\ViewBase;
use Core\BaseController;
use Core\BaseModel;

class EstoqueController
{
    public function index(){
        $nome= "Vinicius Pereira da silva";
        $msg = ViewBase::getInstance();
        $msg->assign("Name",$nome);
        $msg->display('Estoques/index.tpl');
    }
    public function cadastro(){
        $index = ViewBase::getInstance();
        $index->assign('matricula',1002993092);
        $index->display('Estoques/cadastro.tpl');
    }
    public function relatorios(){
        $index = ViewBase::getInstance();
        $index->assign('matricula',1002993092);
        $index->display('Estoques/relatorio.tpl');
    }
}