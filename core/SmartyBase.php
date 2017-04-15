<?php
/**
 * Created by PhpStorm.
 * User: b-boy
 * Date: 26/03/2017
 * Time: 18:03
 */

namespace Core;
use Smarty;

class SmartyBase
{
    const SMARTY_DIR = __DIR__.'/../utill/Smarty/';
    const TEMPLATES_DIR = __DIR__ . '/../app/Views/Smarty/templates/SGPE/';
    const TEMPLATESC_DIR = __DIR__ . '/../app/Views/Smarty/templates_c/';
    const CONFIG_DIR = __DIR__ . '/../app/Views/Smarty/config/';
    const CACHE_DIR  = __DIR__ . '/../app/Views/Smarty/cache/';
    protected static $instance;

    protected static function getInstanceSmarty(){
      $dirSmarty = require_once self::SMARTY_DIR.'Smarty.class.php';
      self::$instance = new Smarty();
      self::$instance->template_dir  = self::TEMPLATES_DIR;
      self::$instance->compile_dir = self::TEMPLATESC_DIR;
      self::$instance->cache_dir   = self::CACHE_DIR;
      self::$instance->config_dir  = self::CONFIG_DIR;
      return self::$instance;
    }
}