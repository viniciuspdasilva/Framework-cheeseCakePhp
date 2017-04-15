<?php
/**
 * Created by PhpStorm.
 * User: b-boy
 * Date: 16/03/2017
 * Time: 19:10
 */

namespace Core;
use Core\SmartyBase;
use Smarty;

abstract class ViewBase extends SmartyBase
{
    const DIRECTORY_BASE = __DIR__."/../app/Views/";


     public static function view($arquivo){
         $display = self::getInstance();
         $display->display($arquivo);
     }

     public static function getInstance(){
         $smarty = parent::getInstanceSmarty();
         $smarty->assign("Nome","Vinicius");
         return $smarty;
     }


}