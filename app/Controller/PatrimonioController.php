<?php
/**
 * Created by PhpStorm.
 * User: b-boy
 * Date: 27/03/2017
 * Time: 13:18
 */

namespace App\Controller;
use Core\ViewBase;
use Core\BaseController;
use Core\BaseModel;
use Core\SmartyBase;

class PatrimonioController extends BaseController
{

    public function index(){
        ViewBase::view('Patrimonios/index.tpl');
    }
    public function cadastro(){
        $index = ViewBase::getInstance();
        $index->assign('matricula',1002993092);
        $index->display('Patrimonios/cadastro.tpl');
    }
    public function relatorios(){

        $index = ViewBase::getInstance();
        $index->assign('matricula',1002993092);
        $index->display('Patrimonios/relatorio.tpl');
    }
    public function confirmaForm(){
        var_dump($_GET);
        $request = BaseController::post($_POST);
        var_dump($request);
    }
    public function transferencia(){
        $index = ViewBase::getInstance();
        $index->assign('matricula',1002993092);
        $index->display('Patrimonios/transf.tpl');
    }

}