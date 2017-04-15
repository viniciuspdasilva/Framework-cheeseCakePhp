<?php
/**
 * Created by PhpStorm.
 * User: b-boy
 * Date: 27/03/2017
 * Time: 13:21
 */

namespace App\Controller;
use Core\ViewBase;
use Core\BaseController;
use Core\BaseModel;

class RelatoriosController
{
    public function index()
    {
        ViewBase::view('Relatorios/index.tpl');

    }
}