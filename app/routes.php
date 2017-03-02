<?php
    $route[] = ['/','HomeController@index'];
    $route[] = ['/posts/','PostsController@show'];
    $route[] = ['/alunos/','alunosController@show'];
    $route[] = ['/posts/{id}/show','PostsController@show'];
    return $route;