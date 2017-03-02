<?php
    $route[] = ['/','HomeController@index'];
    $route[] = ['/{id}/show','HomeController@show'];
    $route[] = ['/posts/','PostsController@show'];
    $route[] = ['/alunos/','alunosController@show'];
    $route[] = ['/posts/{id}/show','PostsController@show'];
    return $route;