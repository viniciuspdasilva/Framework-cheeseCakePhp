<?php
    /*Rotas da index do app*/
    $route[] = ['/','HomeController@index'];
    /*Rotas do erros de Navegação*/
    $route[] = ['/error404','ErrosController@error404'];
    /*Rotas de Login*/
    $route[] = ['/login', 'LoginController@index'];
    $route[] = ['/login/cadastro', 'LoginController@cadastro'];
    $route[] = ['/login/cadastro/validacao', 'LoginController@validacao'];
    /*Rotas da aplicação*/
    /*Patrimonio*/
    $route[] = ['/patrimonio','PatrimonioController@index'];
    $route[] = ['/patrimonio/cadastro','PatrimonioController@cadastro'];
    $route[] = ['/estoque/cadastro/confirmaForm','PatrimonioController@confirmaForm'];
    $route[] = ['/patrimonio/cadastro/transferencia','PatrimonioController@transferencia'];
    $route[] = ['/patrimonio/relatorios','PatrimonioController@relatorios'];
    /*Estoque*/
    $route[] = ['/estoque','EstoqueController@index'];
    $route[] = ['/estoque/cadastro','EstoqueController@cadastro'];
    $route[] = ['/estoque/relatorios','EstoqueController@relatorios'];
    /*Recursos Humanos*/
    $route[] = ['/rh','RecursosHumanosController@index'];
    $route[] = ['/rh/cadastro','RecursosHumanosController@cadastro'];
    $route[] = ['/rh/relatorios','RecursosHumanosController@relatorios'];
    /*Relatorios*/
    $route[] = ['/relatorios','RelatoriosController@index'];

    return $route;