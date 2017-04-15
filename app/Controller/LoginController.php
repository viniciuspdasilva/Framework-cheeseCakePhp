<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 24/03/2017
 * Time: 14:35
 */

namespace App\Controller;
use Core\BaseController;
use Core\Routes;
use Core\ViewBase;

class LoginController extends BaseController
{
    private $dirSmart = __DIR__.'/../../utill/Smarty/Smarty.class.php';
    public function index(){
        ViewBase::view('login/login.tpl');
    }
    public function validacao(){
        if ($_POST){
            $login = $_POST['Login'];
            $senha = $_POST['Senha'];
            echo "Seu Login é {$login} e a sua Senha é {$senha}";
        }
    }
    public function cadastro()
    {
        ViewBase::view('login/cadastro/cadastro.tpl');
    }

}